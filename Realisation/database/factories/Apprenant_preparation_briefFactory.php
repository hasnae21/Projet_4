<?php

namespace Database\Factories;

use App\Models\Apprenant;
use App\Models\Preparation_brief;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Apprenant_preparation_brief>
 */
class Apprenant_preparation_briefFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $Apprenantid=Apprenant::all()->pluck('id')->toArray();
        $Preparationbriefid=Preparation_brief::all()->pluck('id')->toArray();
        return [
            "Date_affectation"=>$this->faker->dateTime(),
            "Apprenant_id"=>$this->faker->randomElement($Apprenantid),
            "Preparation_brief_id"=>$this->faker->randomElement($Preparationbriefid),
            
        ];
    }
}
