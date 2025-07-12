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
        // if request accepts json
        if (request()->is('api/*')) {
            $articles = Article::where('isPublished', true)->join('users', 'users.id', '=', 'articles.author_id')->select('articles.*', 'users.name as author')->get();
            return response()->json(['articles' => $articles], 200);
        } else {
            $articles = Article::join('users', 'users.id', '=', 'articles.author_id')->select('articles.*', 'users.name as author')->get();
            return view('articles.index', compact('articles'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('articles.create');
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
            'cover' => 'required',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator->errors());
        }
        if (request()->hasFile('cover')) {
            $file = request()->file('cover');
            $fileName = uniqid() . time() . '.' . $file->getClientOriginalExtension();
            $file->move('storage/article_images', $fileName);
            $path = '/storage/article_images/' . $fileName;
        }
        Article::create([
            'title' => request('title'),
            'category' => request('category'),
            'author_id' => Auth::user()->id,
            'content' => request('content'),
            'image' => $path,
            'slug' => Str::slug(str_replace('?', '', request('title')), '-'),
            'isPublished' => request('isPublished')??false,
        ]);
        if (request()->is('api/*')) {
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
        if(request()->is('api/*')) {
            return response()->json(['article'=> $article],200);
        }else{
            return view('articles.show', compact('article'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        return view('articles.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        if (request('title') != null) {
            $article->title = request('title');
            $article->slug = Str::slug(str_replace('?', '', request('title')),'-');
        }
        if (request('category') != null) {
            $article->category = request('category');
        }
        if (request('content') != null) {
            $article->content = request('content');
        }
        if (request('cover') != null) {
            $file = request()->file('cover');
            $fileName = uniqid() . time() . '.' . $file->getClientOriginalExtension();
            $file->move('storage/article_images', $fileName);
            $article->image = '/storage/article_images/' . $fileName;
        }
        if (request('isPublished') != null) {
            $article->isPublished = request('isPublished');
        }
        $article->update();
        if (request()->is('api/*')) {
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
        Article::destroy($article->id);
        if (request()->is('api/*')) {
            return response()->json(['message'=> 'Article deleted successfully'], 200);
        }else{
            return redirect()->route('articles.index')->with('success', 'Article deleted successfully');
        }
    }
}
