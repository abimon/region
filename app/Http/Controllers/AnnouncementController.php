<?php

namespace App\Http\Controllers;

use App\Models\Announcement;

class AnnouncementController extends Controller
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
    public function store()
    {
        try {
            Announcement::create([
                'title' => request('title'),
                'content' => request('content'),
                'due_by' => request('due_by'),
                'class_id' => request('class_id'),
                'created_by' => request('created_by'),
                'is_active' => request('is_active')
            ]);
            if (request()->is('api/*')) {
                return response()->json(['message' => 'Announcement created successfully']);
            }
            return redirect()->back()->with('success', 'Announcement created successfully');
        } catch (\Throwable $th) {
            if (request()->is('api/*')) {
                return response()->json(['message' => 'Error: '.$th->getMessage()], 500);
            }
            return redirect()->back()->with('success', 'Error: '. $th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Announcement $announcement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Announcement $announcement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Announcement $announcement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Announcement $announcement)
    {
        //
    }
}
