<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Skill;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Skill::create([
            'name' => 'Attaque puissante',
        ]);
        
        Skill::create([
            'name' => 'Esquive rapide',
        ]);
        
        Skill::create([
            'name' => 'Guérison rapide',
        ]);
        
        Skill::create([
            'name' => 'Contrôle mental',
        ]);
        
        Skill::create([
            'name' => 'Tir précis',
        ]);
        
        Skill::create([
            'name' => 'Invocation de créatures',
        ]);
        
        Skill::create([
            'name' => 'Invisibilité',
        ]);
        
        Skill::create([
            'name' => 'Vol plané',
        ]);
        
        Skill::create([
            'name' => 'Manipulation des éléments',
        ]);
        
        Skill::create([
            'name' => 'Téléportation',
        ]);
        
        Skill::create([
            'name' => 'Régénération automatique',
        ]);
        
        Skill::create([
            'name' => 'Illusions puissantes',
        ]);
        
        Skill::create([
            'name' => 'Camouflage naturel',
        ]);
        
        Skill::create([
            'name' => 'Lecture de pensées',
        ]);
        
        Skill::create([
            'name' => "Création d'objets magiques",
        ]);
        
        Skill::create([
            'name' => 'Ralentissement temporel',
        ]);
        
        Skill::create([
            'name' => 'Super force',
        ]);
        
        Skill::create([
            'name' => 'Invocation de tempête',
        ]);
        
        Skill::create([
            'name' => 'Guérison par la lumière',
        ]);
        
        Skill::create([
            'name' => "Absorption d'énergie",
        ]);
        
        Skill::create([
            'name' => 'Transmutation',
        ]);
        
        Skill::create([
            'name' => 'Sens aiguisés',
        ]);
        
        Skill::create([
            'name' => 'Électrokinésie',
        ]);
        
        Skill::create([
            'name' => 'Changement de forme',
        ]);
        
        Skill::create([
            'name' => 'Création de portails',
        ]);
        
        
    }
}
