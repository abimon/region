<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $enrollments = Enrollment::all();
        return view("enrollments.index", compact("enrollments"));
    }

    /**
     * Show the form for creating a new resource.
     */

    public function create()
    {
        // dd(request());
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
        $status = Enrollment::where([['user_id', request('user_id')], ['lesson_id', request('lesson_id')]])->exists();
        if (!$status && Enrollment::where('user_id', request('user_id'))->count() < 5) {
            Enrollment::create([
                'user_id' => request('user_id'),
                'lesson_id' => request('lesson_id'),
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
            $enrollments = Enrollment::where('user_id', $id)->join('lessons', 'lessons.id', '=', 'enrollments.lesson_id')->join('users', 'users.id', '=', 'lessons.instructor_id')->select('enrollments.status', 'enrollments.id as lesson_id','lessons.*', 'users.name as instructor')->get();
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
