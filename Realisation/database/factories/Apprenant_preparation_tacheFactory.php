<?php

namespace Database\Factories;

use App\Models\Apprenant;
use App\Models\Apprenant_preparation_brief;
use App\Models\Preparation_tache;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Apprenant_preparation_tache>
 */
class Apprenant_preparation_tacheFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $Preparationtacheid=Preparation_tache::all()->pluck('id')->toArray();
        $ApprenantPBriefid=Apprenant_preparation_brief::all()->pluck('id')->toArray();
        $Apprenantid=Apprenant::all()->pluck('id')->toArray();
        return [
            "Preparation_tache_id"=>$this->faker->randomElement($Preparationtacheid),
            "Apprenant_P_Brief_id"=>$this->faker->randomElement($ApprenantPBriefid),
            "Apprenant_id"=>$this->faker->randomElement($Apprenantid),
            "Etat"=>$this->faker->randomElement(['en pause', 'terminer', 'en cours']) ,
            "date_debut"=>$this->faker->date(),
            "date_fin"=>$this->faker->date(),
        ];
    }
}
