<?php

namespace App\Http\Controllers;

use App\Models\ClubRequirement;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClubRequirementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $requirements= ClubRequirement::where('club',request('club'))->with('subrequirements')->get();
        if(request()->is('api/*')){
            return response()->json(['requirements'=>$requirements],200);
        }
        return view('clubrequirements.index',compact('requirements'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ClubRequirement $clubRequirement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ClubRequirement $clubRequirement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ClubRequirement $clubRequirement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ClubRequirement $clubRequirement)
    {
        //
    }
}
