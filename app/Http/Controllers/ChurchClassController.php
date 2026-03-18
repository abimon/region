<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Assigment;
use App\Models\Church;
use App\Models\ChurchClass;
use App\Models\ClassMember;
use App\Models\Lesson;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChurchClassController extends Controller
{

    public function index()
    {
        $membership = ClassMember::where('user_id', Auth::user()->id)->get();
        $classes = ChurchClass::whereIn('id', $membership->pluck('church_class_id')->toArray())->get();
        foreach ($classes as $class) {
            $class->church = Church::findOrFail($class->church_id)->name;
            foreach ($membership->where('church_class_id', $class->id) as $key => $value) {
                $class->role = ucfirst($value->first()->role);
                $class->status = ucfirst($value->first()->status);
            }
        }
        if (request()->is('api/*')) {
            return response()->json(['classes' => $classes, 'message' => 'Classes retrieved successfully'], 200);
        }
        return view('church.classes', compact('classes'));
    }

    public function create()
    {
        //
    }
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

    public function show($church)
    {
        $_church = Church::where('name', $church)->first();
        $classes = ChurchClass::where('church_id', $_church->id)->get();
        if (request()->is('api/*')) {
            foreach ($classes as $key => $class) {
                $user = ClassMember::where([['church_class_id', $class->id], ['user_id', Auth::user()->id]])->first();
                if ($user) {
                    if ($user->status == 'approved') {
                        $class->is_enrolled = true;
                        $class->status = 'Approved';
                    } else {
                        $class->is_enrolled = true;
                        $class->status = ucfirst($user->status);
                    }
                } else {
                    $class->is_enrolled = false;
                    $class->status = 'Unknown';
                }
            }
            return response()->json(['classes' => $classes, 'message' => 'Classes retrieved successfully'], 200);
        }
        return view('churches.classes', compact('classes', 'church'));
    }

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

    public function class_data($id)
    {
        $class = ChurchClass::findOrFail($id);
        $members = ClassMember::where('church_class_id', $id)->join('users','users.id','=','class_members.user_id')->select('class_members.*','users.name', 'users.email', 'users.contact', 'users.institution', 'users.gender', 'users.avatar')->orderBy('users.name')->get();
        $lessons = Lesson::where('class_id', $id)->get();
        $announcements = Announcement::where('class_id', $id)->get();
        $assignments = Assigment::where('class_id', $id)->get();
        if (request()->is('api/*')) {
            return response()->json(['message' => 'Class retrieved successfully', 'class' => $class, 'members' => $members, 'lessons' => $lessons, 'announcements' => $announcements, 'assignments' => $assignments], 200);
        }
        return view('church.class', compact('class', 'members', 'lessons', 'announcements', 'assignments'));
    }
    public function enroll($id)
    {
        ClassMember::create([
            'church_class_id' => $id,
            'user_id' => Auth::user()->id,
            'role' => 'member',
            'status' => 'pending',
        ]);
        if (request()->is('api/*')) {
            return response()->json(['message' => 'Class enrolled successfully'], 200);
        }
    }
    public function destroy(ChurchClass $churchClass)
    {
        //
    }
}
