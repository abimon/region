<?php

namespace App\Http\Controllers;

use App\Models\LessonResource;
use Illuminate\Http\Request;

class LessonResourceController extends Controller
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
            if(request()->hasFile('file')){
                $extension = request()->file('file')->getClientOriginalExtension();
                $filename = time() . '.' . $extension;
                $file = request()->file('file');
                $file->move('storage/lessonResources', $filename);
            }else{
                if(request()->is('api/*')){
                    return response()->json(['message'=>'File is required'],400);
                }
                return redirect()->back()->with('error','File is required');
            }
            LessonResource::create([
                'lesson_id'=>request('lesson_id'),
                'title'=>request('title'),
                'path'=>$file,
                'status'=>request('status'),
            ]);
            if(request()->is('api/*')){
                return response()->json(['message'=>'Resource added successfully'],200);
            }
            return redirect()->back()->with('success','Resource added successfully');
        } catch (\Throwable $th) {
            if(request()->is('api/*')){
                return response()->json(['message'=>'Something went wrong'],500);
            }
            return redirect()->back()->with('error','Something went wrong');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(LessonResource $lessonResource)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LessonResource $lessonResource)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, LessonResource $lessonResource)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LessonResource $lessonResource)
    {
        //
    }
}
