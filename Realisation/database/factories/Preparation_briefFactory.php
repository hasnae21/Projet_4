<?php

namespace Database\Factories;

use App\Models\Formateur;
use App\Models\Preparation_brief;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Preparation_brief>
 */
class Preparation_briefFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $formateur=Formateur::all()->pluck('id')->toArray();
        return [
            "Nom_du_brief"=>$this->faker->name(),
            "Description"=>$this->faker->text(),
            "Duree"=>$this->faker->dayOfMonth().'S',
            "Formateur_id"=>$this->faker->randomElement($formateur),
        ];
    }
}
