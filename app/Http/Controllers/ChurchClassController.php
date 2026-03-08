<?php

namespace App\Http\Controllers;

use App\Models\Church;
use App\Models\ChurchClass;
use App\Models\ClassMember;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChurchClassController extends Controller
{

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
            $church = Church::where('name', request('church'))->first();
            ChurchClass::create([
                'class_name' => request('name'),
                'church_id' => $church->id,
            ]);
            if (request()->is('api/*')) {
                return response()->json(['message' => 'Class created successfully'], 200);
            }
            return redirect()->back()->with('success', 'Class created successfully');
        } catch (\Throwable $th) {
            if (request()->is('api/*')) {
                return response()->json(['message' => 'Class creation failed'], 500);
            }
            return redirect()->back()->with('error', 'Class creation failed');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($church)
    {
        $_church = Church::where('name', $church)->first();
        $classes = ChurchClass::where('church_id', $_church->id)->get();
        if (request()->is('api/*')) {
            foreach($classes as $key=>$class){
                $user = ClassMember::where([['church_class_id', $class->id], ['user_id', Auth::user()->id]])->first();
                if($user){
                    if($user->status=='approved'){
                        $class->is_enrolled = true;
                        $class->status = 'Approved';
                    }else{
                        $class->is_enrolled = true;
                        $class->status =ucfirst( $user->status);
                    }
                }else{
                    $class->is_enrolled = false;
                    $class->status = 'Unknown';
                }
            }
            return response()->json(['classes' => $classes, 'message' => 'Classes retrieved successfully'], 200);
        }
        return view('churches.classes', compact('classes', 'church'));
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

    public function getMembers($church)
    {
        // $church = Church::where('name',$church)->first();
        $members = User::orderBy('name', 'asc')->where('institution', $church)->get();
        return response()->json(['members' => $members, 'message' => 'Members retrieved successfully'], 200);
    }
}
