<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::join('users', 'users.id', '=', 'articles.author_id')->select('articles.*', 'users.name')->get();
        // if request accepts json
        if (request()->wantsJson()) {
            return response()->json(['articles' => $articles], 200);
        } else {
            return view('', compact('articles'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
        $validator = Validator::make(request()->all(), [
            'title' => 'required',
            'category' => 'required',
            'content' => 'required',
            'image' => 'required',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator->errors());
        }
        if (request()->hasFile('image')) {
            $file = request()->file('cover_image');
            $fileName = uniqid() . time() . '.' . $file->getClientOriginalExtension();
            $file->move('storage/article_images', $fileName);
            $path = '/storage/article_images/' . $fileName;
        }
        Article::create([
            'title' => request('title'),
            'category' => request('category'),
            'author_id' => Auth::user()->id,
            'content' => request('content'),
            'image' => request('image'),
            'slug' => Str::make(request('title'), '_'),
            'isPublished' => request('isPublished'),
        ]);
        if (request()->wantsJson()) {
            return response()->json(['message' => 'Article created successfully'], 201);
        } else {
            return redirect()->route('articles.index')->with('success', 'Article created successfully');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        if (request('title') != null) {
            $article->title = request('title');
            $article->slug = Str::make(request('title'));
        }
        if (request('category') != null) {
            $article->category = request('category');
        }
        if (request('content') != null) {
            $article->content = request('content');
        }
        if (request('image') != null) {
            $file = request()->file('cover_image');
            $fileName = uniqid() . time() . '.' . $file->getClientOriginalExtension();
            $file->move('storage/article_images', $fileName);
            $article->image = '/storage/article_images/' . $fileName;
        }
        if (request('isPublished') != null) {
            $article->isPublished = request('isPublished');
        }
        $article->update();
        if (request()->wantsJson()) {
            return response()->json(['message' => 'Article updated successfully'], 200);
        } else {
            return redirect()->route('articles.show', $article->id)->with('success', 'Article updated successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        //
    }
}
