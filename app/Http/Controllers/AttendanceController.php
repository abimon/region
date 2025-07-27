<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = User::withExists(['attendances as is_present' => function ($query) {
            $query->whereDate('created_at', Carbon::today())->where('lesson_id', request('lesson_id'));
        }])->get();
        $attendance = Attendance::where('lesson_id', request('lesson_id'))->join('users', 'users.id', '=', 'attendances.user_id')->join('lesson_classes', 'lesson_classes.id', '=', 'attendances.lesson_id')->select('users.*', 'lesson_classes.title')->get();
        if(request()->is('api/*')){
            return response()->json(['attendance'=>$attendance,'students'=>$students]);
        }
        return view('attendance.index', compact('attendance'));
        
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
        // dd(request()->present);
        try {
            foreach (request('present') as $pre) {
                if ($pre['is_present'] == true) {
                    Attendance::create([
                        'user_id' => $pre['id'],
                        'lesson_id' => request('lesson_id'),
                    ]);
                } else {
                    Attendance::destroy($pre['id']);
                }
            }
            if (request()->is('api/*')) {
                return response()->json(['success' => true]);
            }
            return redirect()->back()->with('success', 'Attendance recorded successfully');
        } catch (\Throwable $th) {
            return response()->json(['error'=> $th->getMessage()]);
        }
        
    }

    /**
     * Display the specified resource.
     */
    public function show($date)
    {
        $students = User::withExists(['attendances as is_present' => function ($query) {
            $query->whereDate('created_at', Carbon::today());
        }])->get();
        if(Auth::user()->role =='Admin'){
            $attendance = Attendance::where('created_at', request('date'))->join('users', 'users.id', '=', 'attendances.user_id')->join('lesson_classes', 'lesson_classes.id', '=', 'attendances.lesson_id')->select('users.*','lesson_classes.title')->get();
        }else{
            $attendance = Attendance::join('users', 'users.id', '=', 'attendances.user_id')->join('lesson_classes', 'lesson_classes.id', '=', 'attendances.lesson_id')->where([['lesson_classes.created_by', Auth::user()->id],[]])->select('users.*')->get();
        }
        if (request()->is('api/*')) {
            return response()->json(['attendance' => $attendance,'students'=>$students]);
        }
        return view('attendance.index', compact('attendance'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Attendance $attendance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Attendance $attendance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Attendance $attendance)
    {
        //
    }
}
