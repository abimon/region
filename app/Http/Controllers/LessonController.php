<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lessons = Lesson::join('users', 'users.id', '=', 'lessons.author_id')->select('lessons.*', 'users.name')->get();
        // if request accepts json
        if (request()->wantsJson()) {
            return response()->json(['lessons' => $lessons], 200);
        } else {
            return view('', compact('lessons'));
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
            $file->move('storage/lesson_images', $fileName);
            $path = '/storage/lesson_images/' . $fileName;
        }
        Lesson::create([
            'title' => request('title'),
            'category' => request('category'),
            'author_id' => Auth::user()->id,
            'content' => request('content'),
            'image' => request('image'),
            'slug' => Str::make(request('title'), '_'),
            'isPublished' => request('isPublished'),
        ]);
        if (request()->wantsJson()) {
            return response()->json(['message' => 'Lesson created successfully'], 201);
        } else {
            return redirect()->route('lessons.index')->with('success', 'Lesson created successfully');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Lesson $lesson)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lesson $lesson)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lesson $lesson)
    {
        if (request('title') != null) {
            $lesson->title = request('title');
            $lesson->slug = Str::make(request('title'));
        }
        if (request('category') != null) {
            $lesson->category = request('category');
        }
        if (request('content') != null) {
            $lesson->content = request('content');
        }
        if (request('image') != null) {
            $file = request()->file('cover_image');
            $fileName = uniqid() . time() . '.' . $file->getClientOriginalExtension();
            $file->move('storage/lesson_images', $fileName);
            $lesson->image = '/storage/lesson_images/' . $fileName;
        }
        if (request('isPublished') != null) {
            $lesson->isPublished = request('isPublished');
        }
        $lesson->update();
        if (request()->wantsJson()) {
            return response()->json(['message' => 'Lesson updated successfully'], 200);
        } else {
            return redirect()->route('lessons.show', $lesson->id)->with('success', 'Lesson updated successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lesson $lesson)
    {
        //
    }
}
