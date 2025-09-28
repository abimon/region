<?php

namespace App\Http\Controllers;

use App\Models\LessonClass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LessonClassController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(Auth::user()->role =='Admin' || Auth::user()->role =='Area Co-ordinator'|| Auth::user()->role =='CYD/FYD'){
            $lesson = LessonClass::all();
        }else{
            $lesson = LessonClass::where('created_by', Auth::user()->id)->get();
        }
        if(request()->is('api/*')){
            return response()->json($lesson);
        }
        return view('lessonclass.index', compact('lesson'));
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
        try {
            LessonClass::create([
                'title' => request('title'),
                'description' => request('description'),
                'facilitator' => request('facilitator'),
                'date' => request('date'),
                'venue' => request('venue'),
                'comments' => request('comments'),
                'created_by' => Auth::user()->id,
            ]);
            if (request()->is('api/*')) {
                return response()->json(['message' => 'Lesson Class Created Successfully']);
            }
            return back()->with('success', 'Lesson Class Created Successfully');
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(LessonClass $lessonClass)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LessonClass $lessonClass)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, LessonClass $lessonClass)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            LessonClass::destroy($id);
            if (request()->is('api/*')) {
                return response()->json(['message' => 'Lesson Class Deleted Successfully']);
            }else{
                return back()->with('success','Lesson Class Deleted Successfully');
            }
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }
}
