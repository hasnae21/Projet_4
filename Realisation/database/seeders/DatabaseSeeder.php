<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Formateur::factory(5)->create();
        \App\Models\Annee_formation::factory(5)->create();
        \App\Models\Groupes::factory(5)->create();
        \App\Models\Apprenant::factory(5)->create();
        \App\Models\Preparation_brief::factory(5)->create();
        \App\Models\Preparation_tache::factory(5)->create();
        \App\Models\Apprenant_preparation_brief::factory(5)->create();
        \App\Models\Groupes_preparation_brief::factory(5)->create();
        \App\Models\Apprenant_preparation_tache::factory(5)->create();
        \App\Models\Groupes_apprenant::factory(5)->create();
    }
}