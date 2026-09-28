<?php

namespace App\Http\Controllers;

use App\Models\Church;
use App\Models\ClassMember;
use App\Models\Lesson;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $conference = ['Admin', 'CYD/FYD'];
        $region = ['Area Co-ordinator', 'Assessor'];
        $local = ['Director', 'Ass. Director', 'Elder', 'Instructor', 'Member'];
        if (in_array(Auth::user()->role, $conference)) {
            $users = User::orderBy('name', 'asc')->get();
            $message = 'All users';
        } elseif (in_array(Auth::user()->role, $region)) {
            $churches = Church::where('station', Auth::user()->church->station)->get();
            $users = User::whereIn('institution', $churches->pluck('name'))->orderBy('name', 'asc')->get();
            $message = 'All users in your region';
        } elseif (in_array(Auth::user()->role, $local)) {
            $users = User::where('institution', Auth::user()->institution)->orderBy('name', 'asc')->get();
            $message = 'All users in your church';
        } else {
            $users = [];
            $message = 'No users';
        }
        if (request()->is('api/*')) {
            return response()->json([
                'status' => true,
                'message' => $message,
                'users' => $users,
                'church'=>Church::where('name', Auth::user()->institution)->first()
            ], 200);
        }

        return view('user.index', compact('users'));
    }

    public function forgotPassword()
    {
        $email = request('email');
        $user = User::where('email', $email)->first();
        if ($user) {
            // delete all tokens associated with the user
            $user->tokens()->delete();
            $code = rand(1000, 9999);
            $this->sendEmail($user->name, request('email'), 'Your password reset code is: ' . $code, 'Password Reset Code');
            
            $user->save();
            return response()->json([
                'status' => true,
                'otp' => $code,
                'token'=>$user->createToken("API TOKEN")->plainTextToken,
                'message' => 'Password reset link sent to your email',
            ], 200);
        }
        return response()->json([
            'status' => false,
            'message' => 'Email does not exist',
        ], 404);
    }
    public function resetPassword()
    {
        $user = User::findOrFail(Auth::id());
        if (request('password') != null) {
            $user->password = Hash::make(request('password'));
            $user->save();
            return response()->json([
                'status' => true,
                'message' => 'Password reset successfully',
            ], 200);
        }
        return response()->json([
            'status' => false,
            'message' => 'Password not provided',
        ], 404);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try {
            $validateUser = Validator::make(
                request()->all(),
                [
                    'email' => 'required|email',
                    'password' => 'required'
                ]
            );

            if ($validateUser->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validateUser->errors()
                ], 401);
            }

            if (!Auth::attempt(request()->only(['email', 'password']))) {
                return response()->json([
                    'status' => false,
                    'message' => 'Email & Password does not match with our record.',
                ], 401);
            }

            $user = User::where('email', request()->email)->first();
            $user->tokens()->delete();
            Auth::login($user);
            return response()->json([
                'status' => true,
                'message' => 'User Logged In Successfully',
                'user' => Auth::user(),
                'church'=>Church::where('name', Auth::user()->institution)->first(),
                'token' => $user->createToken("API TOKEN")->plainTextToken
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 401);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validateUser = Validator::make(
                request()->all(),
                [
                    'name' => 'required|string|unique:users,name',
                    'email' => 'required|email|unique:users,email',
                    'password' => 'required|min:8',
                    'contact' => 'required|min:9',
                    'church' => 'required',
                    'dob' => 'required',
                    'gender' => 'required',
                    'club'=>'required',
                    'class'=>'required',
                ]
            );

            if ($validateUser->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validateUser->errors()
                ], 401);
            }
            $church= Church::where('name', request('church'))->first();
            $user = User::create([
                'name' => request('name'),
                'contact' => request('contact'),
                'email' => request('email'),
                'password' => Hash::make(request('password')),
                'church_id' =>$church->id,
                'dob' => request('dob'),
                'gender' => request('gender'),
                'role' => request('role') ?? 'Member',
                'class' => request('class') ?? 'master-guide',
                'club' => request('club') ,
                'parent_id' => request('parent_id') ?? null,
            ]);
            ClassMember::create([
                'church_id'=>$church->id,
                'user_id'=>$user->id,
                'class'=> request('class') ?? 'master-guide' ,
                'role'=> request('role') ?? 'Member',
                'status'=>'active'
            ]);
            
            return response()->json([
                'status' => true,
                'message' => 'User Created Successfully',
            ], 201);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('user.profile', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function apiUpdate($id)
    {
        return response()->json(['message' => 'User Updated Successfully'], 200);
    }
    public function update($id)
    {
        // return response()->json(['message' => 'User Updated Successfully'], 200);
        try {
            $user = User::findOrFail($id);
            if (request('name') != null) {
                $user->name = request('name');
            }
            if (request('email') != null) {
                $user->email = request('email');
            }
            if (request('contact') != null) {
                $user->contact = request('contact');
            }
            if (request('institution') != null) {
                $user->institution = request('institution');
            }
            if (request('dob') != null) {
                $user->dob = request('dob');
            }
            if (request('gender') != null) {
                $user->gender = request('gender');
            }
            if (request('address') != null) {
                $user->address = request('address');
            }
            if (request('role') != null) {
                $user->role = request('role');
            }
            // if (request('image') != null) {
            //     $file = request()->file('image');
            //     $fileName = ($user->last_name) . time() . '.' . $file->getClientOriginalExtension();
            //     if (request('title') == 'avatar') {
            //         $file->move('storage/avatars', $fileName);
            //         $user->avatar = '/storage/avatars/' . $fileName;
            //     }
            // }
            if (request()->file('cover_image') != null) {
                $file = request()->file('cover_image');
                $fileName = uniqid() . time() . '.' . $file->getClientOriginalExtension();
                $file->move('storage/cover_image', $fileName);
                $user->cover_image = '/storage/cover_image/' . $fileName;
            }
            if (request('about') != null) {
                $user->about = request('about');
            }
            if (request('isInvested') != null) {
                $user->isInvested = request('isInvested');
            }
            if (request('isBaptised') != null) {
                $user->isBaptised = request('isBaptised');
            }
            if (request('password') != null) {
                if (Hash::check(request('old_password'), $user->password)) {
                    $user->password = Hash::make(request('password'));
                } else {
                    return response()->json([
                        'status' => false,
                        'message' => 'Old password does not match with our record.',
                    ], 401);
                }
            }
            $user->update();
            if (request()->is('api/*')) {
                return response()->json(['status' => true, 'message' => 'User Updated Successfully', 'user' => $user], 200);
            } else {
                return back()->with('success', 'User Updated Successfully');
            }
        } catch (\Throwable $th) {
            return response()->json(['status' => false, 'message' => $th->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        User::destroy($user->id);
        if (request()->has('api/*')) {
            return response()->json([
                'status' => true,
                'message' => 'User Deleted Successfully'
            ]);
        } else {
            return back()->with('success', 'User Deleted Successfully');
        }
    }
    public function getAuthUser()
    {
        try {
            $user = Auth::user();
            return response()->json(['status' => true, 'message' => 'User fetched successfully', 'user' => $user], 200);
        } catch (\Throwable $th) {
            return response()->json(['status' => false, 'message' => $th->getMessage()], 500);
        }
    }
    public function getUser($id)
    {
        try {
            $user = User::findOrFail($id);
            return response()->json(['status' => true, 'message' => 'User fetched successfully', 'user' => $user], 200);
        } catch (\Throwable $th) {
            return response()->json(['status' => false, 'message' => $th->getMessage()], 500);
        }
    }
    public function stats()
    {
        $roles = ['CYD/FYD', 'Area Co-ordinator', 'Director', 'Ass. Director', 'Elder', 'Assessor'];
        // $sts = ['Member', 'Visitor', 'Guest'];
        $students = [];
        $instructors = [];
        $lessons = 0;
        $churches = 0;
        $leaders = 0;
        if (request('role') == 'admin') {
            $students = User::where('role', 'Member')->get()->count();
            $instructors = User::where('role', 'Instructor')->get()->count();
            $leaders = User::whereIn('role', $roles)->get()->count();
            $lessons = Lesson::all()->count();
            $churches = Church::all()->count();
        } else {
            $students = User::where('role', 'Member')->where('institution', Auth::user()->institution)->get()->count();
            $instructors = User::where('role', 'Instructor')->where('institution', Auth::user()->institution)->get()->count();
            $leaders = User::whereIn('role', $roles)->where('institution', Auth::user()->institution)->get()->count();
        }
        return response()->json(['students' => $students, 'instructors' => $instructors, 'lessons' => $lessons, 'churches' => $churches,'leaders'=>$leaders]);
    }
    public function sendEmail($user, $email, $content, $subject)
    {
        Mail::send(
            'message',
            ['user' => $user, 'content' => $content],
            function ($message) use ($user, $email, $subject) {
                $message->to($email, $user)->subject($subject);
            }
        );
    }
}
