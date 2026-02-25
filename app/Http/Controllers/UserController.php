<?php

namespace App\Http\Controllers;

use App\Models\Church;
use App\Models\Lesson;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $roles = ['Member', 'CYD/FYD', 'Area Co-ordinator', 'Director', 'Ass. Director', 'Elder', 'Instructor', 'Guest', 'Assessor'];
        $conference = ['Admin','CYD/FYD'];
        $region = ['Area Co-ordinator', 'Assessor'];
        $local = ['Director', 'Ass. Director', 'Elder', 'Instructor','Member'];
        if(in_array(Auth::user()->role,$conference)){
            $users = User::orderBy('name','asc')->get();
            $message= 'All users';
        }elseif(in_array(Auth::user()->role,$region)){
            $churches = Church::where('station',Auth::user()->church->station)->get();
            $users = User::whereIn('institution',$churches->pluck('name'))->orderBy('name', 'asc')->get();
            $message= 'All users in your region';
        }elseif(in_array(Auth::user()->role,$local)){
            $users =User::where('institution', Auth::user()->institution)->orderBy('name','asc')->get();
            $message= 'All users in your church';
        }else{
            $users = [];
            $message= 'No users';
        }
        if(request()->is('api/*')){
            return response()->json([
                'status' => true,
                'message' => $message,
                'users' => $users,
            ], 200);
        }
        
        return view('user.index', compact('users'));
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
            Auth::login($user);
            return response()->json([
                'status' => true,
                'message' => 'User Logged In Successfully',
                'user' => Auth::user(),
                'token' => $user->createToken("API TOKEN")->plainTextToken
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
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
                    'institution' => 'required',
                    'dob' => 'required',
                    'gender' => 'required',
                ]
            );

            if ($validateUser->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validateUser->errors()
                ], 401);
            }

            $user = User::create([
                'name' => request('name'),
                'contact' => request('contact'),
                'email' => request('email'),
                'password' => Hash::make(request('password')),
                'institution' => request('institution'),
                'dob' => request('dob'),
                'gender' => request('gender'),
                'role' => request('role') ?? 'Member',
                'parent_id' => request('parent_id') ?? null,
            ]);
            return response()->json([
                'user' => $user,
                'status' => true,
                'message' => 'User Created Successfully',
                'token' => $user->createToken("API TOKEN")->plainTextToken
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
    public function apiUpdate($id){
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
            if (request('image') != null) {
                $file = request()->file('image');
                $fileName = ($user->last_name) . time() . '.' . $file->getClientOriginalExtension();
                if (request('title') == 'avatar') {
                    $file->move('storage/avatars', $fileName);
                    $user->avatar = '/storage/avatars/' . $fileName;
                }
            }
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
        if(request()->has('api/*')){
            return response()->json([
                'status' => true,
                'message' => 'User Deleted Successfully'
            ]);
        }else{
            return back()->with('success', 'User Deleted Successfully');
        }
    }
    public function getUser(){
        $user= Auth::user();
        return response()->json(['user'=>$user]);
    }

    public function stats(){
        $roles = ['CYD/FYD', 'Area Co-ordinator', 'Director', 'Ass. Director', 'Elder', 'Instructor', 'Assessor'];
        $sts = ['Member', 'Visitor', 'Guest'];
        $students = User::whereIn('role', $sts)->get();
        $instructors = User::whereIn('role', $roles)->orWhere('isInvested',true)->get();
        $lessons = Lesson::all()->count();
        $churches = Church::all()->count();
        return response()->json(['students'=>$students->count(), 'instructors'=>$instructors->count(),'lessons'=>$lessons,'churches'=>$churches]);
    }
}
