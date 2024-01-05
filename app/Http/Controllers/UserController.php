<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('user/edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'firstname' => 'required|max:40',
            'lastname' => 'required|max:40',
            'pseudo' => 'required|max:40',
            'description' => 'nullable|string',
            'image' => 'nullable|max:40',
        ]);

        $user->firstname = $request->input('firstname');
        $user->lastname = $request->input('lastname');
        $user->pseudo = $request->input('pseudo');
        $user->description = $request->input('description');
        $user->image = $request->input('image');

        $user->save();

        return back()->with('message', 'Le compte a bien été mis à jour');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        if(Auth::user()->id == $user->id){
            $user->delete();
            return redirect()->route('home')->with('message', 'Le compte a bien été supprimé');
        }else{
            return redirect()->back()->with(['erreur' => 'Suppression du compte impossible']);
        }
    }
}
