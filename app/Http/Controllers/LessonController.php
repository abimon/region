<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class LessonController extends Controller
{
    public function index()
    {
        $lessons = Lesson::join('users', 'users.id', '=', 'lessons.instructor_id')->select('lessons.*', 'users.name as instructor')->get();
        // if request accepts json
        if (request()->is('api/*')) {
            return response()->json(['lessons' => $lessons], 200);
        } else {
            return view('lessons.index', compact('lessons'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('lessons.create');
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
            $file->move('storage/lesson_images', $fileName);
            $path = '/storage/lesson_images/' . $fileName;
        }
        Lesson::create([
            'title' => request('title'),
            'category' => request('category'),
            'instructor_id' => Auth::user()->id,
            'content' => request('content'),
            'image' => $path,
            'slug' => Str::slug(str_replace('?', '', request('title')), '-'),
            'isPublished' => request('isPublished') ?? false,
        ]);
        if (request()->is('api/*')) {
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
        if (request()->is('api/*')) {
            return response()->json(['lesson' => $lesson], 200);
        } else {
            return view('lessons.show', compact('lesson'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lesson $lesson)
    {
        return view('lessons.edit', compact('lesson'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lesson $lesson)
    {
        if (request('title') != null) {
            $lesson->title = request('title');
            $lesson->slug = Str::slug(str_replace('?', '', request('title')), '-');
        }
        if (request('category') != null) {
            $lesson->category = request('category');
        }
        if (request('content') != null) {
            $lesson->content = request('content');
        }
        if (request('cover') != null) {
            $file = request()->file('cover');
            $fileName = uniqid() . time() . '.' . $file->getClientOriginalExtension();
            $file->move('storage/lesson_images', $fileName);
            $lesson->image = '/storage/lesson_images/' . $fileName;
        }
        if (request('isPublished') != null) {
            $lesson->isPublished = request('isPublished');
        }
        $lesson->update();
        if (request()->is('api/*')) {
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
        Lesson::destroy($lesson->id);
        if (request()->is('api/*')) {
            return response()->json(['message' => 'Lesson deleted successfully'], 200);
        } else {
            return redirect()->route('lessons.index')->with('success', 'Lesson deleted successfully');
        }
    }
}
