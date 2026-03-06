<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(Request $request)
    {
        try {
            Lesson::create([
                'class_id'=>request('class_id'),
                'title'=>request('title'),
                'description'=>request('description'),
                'instructor'=>request('instructor'),
                'date'=>request('date'),
                'venue'=>request('venue'),
                'comments'=>request('comments')??null,
                'created_by'=>Auth::id()
            ]);
            if(request()->is('api/*')){
                return response()->json(['message'=>'Lesson created successfully'],201);
            }
            return back()->with('success','Lesson created successfully');
        } catch (\Throwable $th) {
           if(request()->is('api/*')){
                return response()->json(['message'=>'Something went wrong'],400);
            }
            return back()->with('error','Something went wrong. '.$th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($class_id)
    {
        $lessons = Lesson::orderBy('date','asc')->where('class_id',$class_id)->get();
        if(request()->is('api/*')){
            return response()->json(['lessons'=>$lessons]);
        }
        return view('lessons.index',compact('lessons'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lesson $lesson)
    {
        //
    }

}
