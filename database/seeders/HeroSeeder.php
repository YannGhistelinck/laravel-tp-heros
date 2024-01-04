<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Hero;

class HeroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Hero::create([
            "name" => "Aragorn",
            "race" => "Humain",
            "description" => "Héritier du Gondor et chef des Rangers du Nord, Aragorn est un guerrier redoutable.",
            "gender_id" => 2, // Male
            "skill_id" => 1, // Attaque puissante
            "user_id" => rand(1, 10),
        ]);
        
        Hero::create([
            "name" => "Legolas",
            "race" => "Elfe",
            "description" => "Maître archer et combattant agile, Legolas est un membre de la Communauté de l'Anneau.",
            "gender_id" => 2, // Male
            "skill_id" => 5, // Tir précis
            "user_id" => rand(1, 10),
        ]);
        
        Hero::create([
            "name" => "Galadriel",
            "race" => "Elfe",
            "description" => "Reine des Galadhrim, Galadriel possède une sagesse et une puissance immenses.",
            "gender_id" => 3, // Female
            "skill_id" => 9, // Manipulation des éléments
            "user_id" => rand(1, 10),
        ]);
        
        Hero::create([
            "name" => "Gandalf",
            "race" => "Maia",
            "description" => "Gandalf le Gris est un puissant sorcier et membre de la Communauté de l'Anneau.",
            "gender_id" => 2, // Male
            "skill_id" => 8, // Téléportation
            "user_id" => rand(1, 10),
        ]);
        
        Hero::create([
            "name" => "Wonder Woman",
            "race" => "Amazonienne",
            "description" => "Princesse des Amazones, Wonder Woman est une guerrière redoutable avec des pouvoirs divins.",
            "gender_id" => 3, // Female
            "skill_id" => 20, // Guérison par la lumière
            "user_id" => rand(1, 10),
        ]);
        
        Hero::create([
            "name" => "Spider-Man",
            "race" => "Humain",
            "description" => "Jeune super-héros avec des pouvoirs d'araignée, Spider-Man protège New York.",
            "gender_id" => 2, // Male
            "skill_id" => 18, // Super force
            "user_id" => rand(1, 10),
        ]);
        
        Hero::create([
            "name" => "Storm",
            "race" => "Mutante",
            "description" => "Ororo Munroe, alias Storm, peut manipuler les éléments météorologiques à volonté.",
            "gender_id" => 3, // Female
            "skill_id" => 19, // Invocation de tempête
            "user_id" => rand(1, 10),
        ]);
        
        Hero::create([
            "name" => "Batman",
            "race" => "Humain",
            "description" => "Le Chevalier Noir, Batman utilise l'intelligence et la technologie pour combattre le crime.",
            "gender_id" => 2, // Male
            "skill_id" => 14, // Camouflage naturel
            "user_id" => rand(1, 10),
        ]);
    }
}
