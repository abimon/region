<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {}

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
        if(!Enrollment::where([['student_id', request('student_id')],['course_id', request('course_id')]])->exists() || Enrollment::where('student_id', request('student_id'))->count() < 5){
            Enrollment::create([
                'student_id' => request('student_id'),
                'course_id' => request('course_id'),
            ]);
            if (request()->is('api/*')) {
                return response()->json([
                    'message' => 'Enrollment created successfully',
                ]);
            } else {
                return redirect()->route('enrollments.index')->with('success', 'Enrollment created successfully');
            }
        }
    }

  
    public function show($id)
    {
        if (request()->is('api/*')) {
            $enrollments = Enrollment::where('student_id', $id)->join('users', 'users.id', '=', 'enrollments.student_id')->get();
            return response()->json(['lessons' => $enrollments]);
        } else {
            $enrollment = Enrollment::findOrFail($id);
            return view('enrollments.show', compact('enrollment'));
        }
    }

    public function edit(Enrollment $enrollment)
    {
        //
    }

    public function update(Request $request, Enrollment $enrollment)
    {
        //
    }

    public function destroy(Enrollment $enrollment)
    {
        //
    }
}
