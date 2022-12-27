<?php

namespace Database\Factories;

use App\Models\Annee_formation;
use App\Models\Formateur;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Groupes>
 */
class GroupesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $formateur=Formateur::all()->pluck('id')->toArray();
        $annee_formation =Annee_formation::all()->pluck('id')->toArray();
        return [
            'Nom_groupe'=>$this->faker->name(),
            "Annee_formation_id"=>$this->faker->randomElement($annee_formation),
            'Formateur_id'=> $this->faker->randomElement($formateur),
            "Logo"=>$this->faker->imageUrl(640,480),
        ];
    }
}
