<?php

namespace App\Http\Controllers;

use App\Models\Church;
use App\Models\User;
use Illuminate\Http\Request;

class ChurchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $churches = Church::all();
        $users = User::select('institution as church','name')->get();
        if(request()->is('api/*')){
            $chs = [];
            foreach($churches as $church){
                $chs[] = $church->name;
            }
            return response()->json(['churches'=>$chs,'message'=>'Churches retrieved successfully','users'=>$users],200);
        }else{
            return view('church.index', compact('churches','users'));
        }
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
        try{
            Church::create([
                'name'=>request('name'),
                'district'=>request('district'),
                'station'=>request('station'),
                'conference'=>request('conference'),
                'union'=>request('union'),
                'division'=>request('division'),
                'email'=>request('email'),
                'phone'=>request('phone'),
            ]);
            if(request()->is('api/*')){
                return response()->json(['message'=>'Church added successfully'],201);
            }else{
                return redirect()->back()->with('success','Church added successfully');
            }
        }catch(\Exception $e){
            if(request()->is('api/*')){
                return response()->json(['error'=>'Failed to add church','details'=>$e->getMessage()],500);
            }else{
                return redirect()->back()->with('error','Failed to add church: '.$e->getMessage());
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Church $church)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Church $church)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Church $church)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Church $church)
    {
        //
    }
}
