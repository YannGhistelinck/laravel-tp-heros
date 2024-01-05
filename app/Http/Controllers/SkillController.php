<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Skill;
use Illuminate\Support\Facades\Auth;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $skills = Skill::all();
        return view('skill/skill', compact('skills'));
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
        $request->validate([
            'name' => 'required|max:40'
        ]);

        Skill::create([
            'name' => $request->name,
        ]);
        
        $message = 'Le nouveau pouvoir "'.$request->name.'" a bien été créé';
        return redirect()->back()->with('message', $message);
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Skill $skill)
    {
        $request->validate([
            'name' => 'required|max:40'
        ]);

        $message = 'Le pouvoir "'.$skill->name.'" a bien été modifié en "'.$request->name.'"';

        $skill->name = $request->input('name');

        $skill->save();

        

        return redirect()->back()->with('message', $message);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Skill $skill)
    {
        if(Auth::user()->role_id == 2){
            $message = 'Le pouvoir "'.$skill->name.'" a bien été supprimé';
            $skill->delete();
            return redirect()->back()->with('message', $message);
        }else{
            return redirect()->back()->with(['erreur', 'Suppression du pouvoir impossible']);
        }
    }
}
