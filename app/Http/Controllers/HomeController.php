<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hero;
use Illuminate\Support\Facades\Auth;
use App\Models\Gender;
use App\Models\Skill;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        
        $skills = Skill::all();
        $genders = Gender::all();
        $user = Auth::user();
        


        // $heroes = Hero::all();


        $heroes = Hero::query();

        if ($search = $request->search) {
            $heroes->where('name', 'LIKE', '%' . $search . '%')
                ->orWhere('description', 'LIKE', '%'.$search.'%')
                ->orWhereHas('gender', function ($query) use ($search) {
                    $query->where('gender', 'LIKE', '%' . $search . '%');
                })
                ->orWhereHas('skill', function($query) use ($search){
                    $query->where('name', 'LIKE', '%'.$search.'%');
                })
                ->orWhere('race', 'LIKE', '%'.$search.'%');
        }
    
        $heroes = $heroes->get();
        

        

        return view('home', compact('heroes', 'genders', 'skills'), ['user' => $user]);
    }
}
