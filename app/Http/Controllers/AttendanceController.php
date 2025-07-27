<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //get today's attendance
        

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
    public function show(Attendance $attendance)
    {
        //
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
