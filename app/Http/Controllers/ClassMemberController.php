<?php

namespace App\Http\Controllers;

use App\Models\ClassMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClassMemberController extends Controller
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
        try {
            ClassMember::create([
                'church_class_id'=>request('church_class_id'),
                'user_id'=>Auth::id(),
                'status'=>'pending'
            ]);
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(ClassMember $classMember)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ClassMember $classMember)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($member_id)
    {
        $classMember =ClassMember::findOrFail($member_id);
        if(request('church_class_id')!=null){
            $classMember->church_class_id = request('church_class_id');
        }
        if(request('user_id')!=null){
            $classMember->user_id = request('user_id');
        }
        if(request('role')!=null){
            $classMember->role = request('role');
        }
        if(request('status')!=null){
            $classMember->status = request('status');
        }
        $classMember->update();
        if(request()->is('api/*')){
            return response()->json($classMember,200);
        }
        return redirect()->back()->with('success','Class Member Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ClassMember $classMember)
    {
        //
    }
}
