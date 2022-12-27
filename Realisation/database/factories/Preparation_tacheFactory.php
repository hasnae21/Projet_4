<?php

namespace Database\Factories;

use App\Models\Preparation_brief;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Preparation_tache>
 */
class Preparation_tacheFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $preparationbrief=Preparation_brief::all()->pluck('id')->toArray();

        return [
            "Nom_tache"=>$this->faker->name(),
            "Description"=>$this->faker->text(),
            "Duree"=>$this->faker->dayOfMonth().'S',
            "Preparation_brief_id"=>$this->faker->randomElement($preparationbrief),
        ];
    }
}
