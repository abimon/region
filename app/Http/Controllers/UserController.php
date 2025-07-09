<?php

namespace App\Http\Controllers;

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
        //
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
                    'institution'=>'required',
                    'dob'=>'required',
                    'gender'=>'required',
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
                'dob'=>request('dob'),
                'gender'=>request('gender'),
                'role' => 'Member'
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
        //
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
    public function update($id)
    {
        $user=User::findOrFail($id);
        dd(request('avatar'));
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
        if (request()->file('avatar') != null) {
            $file = request()->file('avatar');
            $fileName = uniqid() . time() . '.' . $file->getClientOriginalExtension();
            $file->move('storage/avatars', $fileName);
            $user->avatar = '/storage/avatars/' . $fileName;
            $user->update();
            return response()->json([
                'status' => true,
                'message' => 'User Updated Successfully',
                'avatar' => '/storage/avatars/' . $fileName
            ]);
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
            $user->password = request('password');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }


    //API FUNCTIONS
    public function login() {}
    public function register() {}
    // public function update(User $user)
}
