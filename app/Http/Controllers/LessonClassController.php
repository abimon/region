<?php

namespace App\Http\Controllers;

use App\Models\Church;
use App\Models\LessonClass;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LessonClassController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(Auth::user()->role =='Admin' || Auth::user()->role =='CYD/FYD'){
            $lesson = LessonClass::join('users', 'lesson_classes.created_by', '=', 'users.id')->select('lesson_classes.*','users.institution')->get();
        }else if( Auth::user()->role == 'Area Co-ordinator'){
            $churches = Church::where('name', Auth::user()->institution)->pluck('name')->toArray();
            $authors = User::whereIn('institution', $churches)->pluck('id')->toArray();
            $lesson = LessonClass::whereIn('created_by', $authors)->join('users', 'lesson_classes.created_by', '=', 'users.id')->select('lesson_classes.*', 'users.institution')->get();;
        }else{
            $authors = User::where('institution',Auth::user()->institution)->pluck('id')->toArray();
            $lesson = LessonClass::whereIn('created_by', $authors)->join('users', 'lesson_classes.created_by', '=', 'users.id')->select('lesson_classes.*', 'users.institution')->get();
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
