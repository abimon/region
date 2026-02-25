<?php

namespace App\Http\Controllers;

use App\Models\Mreq;
use Illuminate\Http\Request;

class MreqController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mreqs = Mreq::with('church')->get();
        if(request()->is('api/*')){
            return response()->json(['status' => true, 'message' => 'Membership and Leadership requirements fetched successfully', 'mreqs' => $mreqs], 200);
        }
        return view('mreq.index', compact('mreqs'));
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
        $data = request()->validate([
            'type' => 'required|in:membership,leadership',
            'description' => 'required|string',
            'church_id' => 'required|exists:churches,id',
        ]);

        try {
            $mreq = Mreq::create($data);
            return response()->json(['status' => true, 'message' => 'Requirement created successfully', 'mreq' => $mreq], 201);
        } catch (\Throwable $th) {
            return response()->json(['status' => false, 'message' => $th->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Mreq $mreq)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mreq $mreq)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mreq $mreq)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mreq $mreq)
    {
        //
    }
}
