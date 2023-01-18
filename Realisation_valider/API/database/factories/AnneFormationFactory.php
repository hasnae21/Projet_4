<?php
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


class AnneFormationFactory extends Factory
{
    public function definition()
    {
        $year=$this->faker->year();
        return [
            "Annee_scolaire"=> ($year) ."-". ($year+1)
        ];
    }
}
