<?php

namespace App\Http\Controllers;

use App\Models\ClassMember;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClassMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        foreach(User::all() as $user){
            if(!ClassMember::where('user_id', $user->id)->exists() && $user->role != 'Super Admin'){
                
                ClassMember::create([
                    'church_id'=>$user->church_id,
                    'user_id'=>$user->id,
                    'class'=>$user->class,
                    'role'=>$user->role,
                    'status'=>'active'
                ]);
            }
        }
        if (Auth::user()->role == 'Super Admin') {
            $user_classes = ClassMember::where('user_id', Auth::id())->get();
            $ids = $user_classes->pluck('church_id')->toArray();
            $classMembers = ClassMember::join('users', 'users.id', '=', 'class_members.user_id')->select('users.name', 'users.avatar', 'users.contact', 'users.class','users.dob','users.club', 'class_members.role', 'class_members.status')->orderBy('users.name', 'asc')->paginate(10);
        } else {
            $user_classes = ClassMember::where('user_id', Auth::id())->get();
            $ids = $user_classes->pluck('church_id')->toArray();
            $classMembers = ClassMember::whereIn('class_members.church_id', $ids)->join('users', 'users.id', '=', 'class_members.user_id')->select('users.name', 'users.avatar', 'users.contact', 'users.class','users.dob', 'users.club','class_members.role', 'class_members.status')->orderBy('users.name', 'asc')->paginate(10);
        }
        if (request()->is('api/*')) {
            return response()->json(['members' => $classMembers], 200);
        }
        return $classMembers;
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
            if (!ClassMember::where([['church_class_id', request('church_class_id')], ['user_id', Auth::id()]])->exists()) {
                ClassMember::create([
                    'church_class_id' => request('church_class_id'),
                    'user_id' => Auth::id(),
                    'status' => 'pending'
                ]);
                if (request()->is('api/*')) {
                    return response()->json(['message' => 'Class Member Added Successfully'], 200);
                }
                return back()->with('success', 'Class Member Added Successfully');
            } else {
                if (request()->is('api/*')) {
                    return response()->json(['message' => 'Class Member Already Exists'], 400);
                }
                return redirect()->back()->with('error', 'Class Member Already Exists');
            }
        } catch (\Throwable $th) {
            if (request()->is('api/*')) {
                return response()->json(['message' => 'An error occurred. ' . $th->getMessage()], 500);
            }
            return redirect()->back()->with('error', 'An error occurred');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {

        $classMembers = ClassMember::where('class_members.church_class_id', $id)->join('users', 'users.id', '=', 'class_members.user_id')->select('users.name', 'users.avatar', 'users.contact', 'class_members.*')->orderBy('users.name', 'asc')->get();
        foreach ($classMembers as $classMember) {
            $classMember->class = $classMember->church_class->class_name;
        }
        if (request()->is('api/*')) {
            return response()->json(['members' => $classMembers], 200);
        }
        return $classMembers;
        // return view('admin.classMembers.show', compact('classMember'));
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
        $classMember = ClassMember::findOrFail($member_id);
        if (request('church_class_id') != null) {
            $classMember->church_class_id = request('church_class_id');
        }
        if (request('user_id') != null) {
            $classMember->user_id = request('user_id');
        }
        if (request('role') != null) {
            $classMember->role = request('role');
        }
        if (request('status') != null) {
            $classMember->status = request('status');
        }
        $classMember->update();
        if (request()->is('api/*')) {
            return response()->json($classMember, 200);
        }
        return redirect()->back()->with('success', 'Class Member Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        ClassMember::destroy($id);
        if (request()->is('api/*')) {
            return response()->json(['message' => 'Class membership deleted successfully'], 200);
        }
        return redirect()->back()->with('success', 'Class membership deleted successfully');
    }
}
