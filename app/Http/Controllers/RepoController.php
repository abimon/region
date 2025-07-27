<?php

namespace App\Http\Controllers;

use App\Models\Repo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RepoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $repos = Repo::where('owner_id',Auth::user()->id)->get();
        if(request()->is('api/*')){
            return $repos;
        }
        return view('repo.index',compact('repos'));
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
        if(request()->hasFile('file')){
            $extension = request()->file('file')->getClientOriginalExtension();
            $filename=time().'.'.$extension;
            $file = request()->file('file');
            $file->move('storage/repos', $filename);
        }
        Repo::create([
            "name"=>request('name'),
            "description"=>request('description'),
            "path"=>'storage/repos/'.$filename,
            "owner_id"=>request('owner_id'),
            "language"=>request('language'),
            "isPublic"=>request('isPublic'),
        ]);
        return 'storage/repos/' . $filename;
    }

    /**
     * Display the specified resource.
     */
    public function show(Repo $repo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Repo $repo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Repo $repo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Repo $repo)
    {
        //
    }
}
