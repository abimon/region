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
        foreach(request('present') as $pre){
            if($pre['is_present']== true){
                Attendance::create([
                    'user_id' => $pre['user_id'],
                ]);
            }else{
                Attendance::destroy($pre['user_id']);
            }
        }
        if(request()->is('api/*')){
            return response()->json(['message' => 'Attendance recorded successfully']);
        }
        return redirect()->back()->with('success', 'Attendance recorded successfully');
        
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
