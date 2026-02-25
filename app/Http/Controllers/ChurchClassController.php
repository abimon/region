<?php

namespace App\Http\Controllers;

use App\Models\Church;
use App\Models\ChurchClass;
use App\Models\User;
use Illuminate\Http\Request;

class ChurchClassController extends Controller
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ChurchClass $churchClass)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ChurchClass $churchClass)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ChurchClass $churchClass)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ChurchClass $churchClass)
    {
        //
    }

    public function getMembers($church){
        // $church = Church::where('name',$church)->first();
        $members = User::orderBy('name','asc')->where('institution',$church)->get();
        return response()->json(['members'=>$members,'message'=>'Members retrieved successfully'],200);
    }
}
