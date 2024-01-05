<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Hero;
use Illuminate\Support\Facades\Storage;

class HeroController extends Controller
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
        
        $request->validate([
            'name' => 'required|max:40',
            'gender_id' => 'required',
            'race' => 'required|max:40',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'skill_id' => 'required',
        ]);
        $filename = "";
        if($request -> hasFile('image')){
            $image = $request->file('image')->getClientOriginalName();
            $image = pathinfo($image, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $filename = time().'-'.$image.'.'.$extension;

            
            $request->file('image')->storeAs('public/uploads', $filename);
        }else{
            $filename=null;
        }

        $user_id = auth()->user()->id;

        Hero::create([
            'name' => $request->name,
            'gender_id' => $request->gender_id,
            'race' => $request->race,
            'description' => $request->description,
            'image' => $filename,
            'skill_id' => $request->skill_id,
            'user_id' => $user_id
        ]);

        return redirect()->route('home')->with('message','Le héro a bien été créé');
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
    public function update(Request $request, Hero $hero)
    {
        
        $request->validate([
            'name' => 'required|max:40',
            'gender_id' => 'required',
            'race' => 'required|max:40',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'skill_id' => 'required',
        ]);
        
            
            

        
        if($request -> hasFile('image')){

            //delete previous image
            $fileLink = 'public/uploads/'.$hero->image;
            if(Storage::exists($fileLink)){
                Storage::delete($fileLink);
            }else{
                return redirect()->back()->with(['erreur', 'Suppression impossible, image introuvable']);
            }


            //compose a unique newfilename
            $image = $request->file('image')->getClientOriginalName();
            $image = pathinfo($image, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $filename = time().'-'.$image.'.'.$extension;

            
            $request->file('image')->storeAs('public/uploads', $filename);



            //store de new filename 
            $hero->image = $filename;
        }

        
        $hero->name = $request->input('name');
        $hero->gender_id = $request->input('gender_id');
        $hero->race = $request->input('race');
        $hero->description = $request->input('description');
        
        $hero->skill_id = $request->input('skill_id');

        $hero->save();

        return back()->with('message', "Le héro a bien été modifié");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Hero $hero)
    {
        if(Auth::user()->id == $hero->user_id or Auth::user()->role_id == 2){


            
            if($hero->image){
                $fileLink = 'public/uploads/'.$hero->image;
                if(Storage::exists($fileLink)){
                    Storage::delete($fileLink);
                }else{
                    return redirect()->back()->with(['erreur', 'Suppression impossible, image introuvable']);
                }
            }
            
            $hero->delete();
            return redirect()->route('home')->with('message', 'Le héro a bien été supprimé');
        }else{
            return redirect()->back()->with(['erreur' => 'Suppression du héro impossible']);
        }
    }
}
