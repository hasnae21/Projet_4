<?php

namespace Database\Factories;

use App\Models\Apprenant;
use App\Models\Groupes;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Groupes_apprenant>
 */
class Groupes_apprenantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $Groupeid=Groupes::all()->pluck('id')->toArray();
        $Apprenantid=Apprenant::all()->pluck('id')->toArray();
        return [
            'Groupe_id'=>$this->faker->randomElement($Groupeid),
            'Apprenant_id'=>$this->faker->randomElement($Apprenantid),

        ];
    }
}
