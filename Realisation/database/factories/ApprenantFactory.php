<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Apprenant>
 */
class ApprenantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "Nom"=>$this->faker->firstName(),
            "Prenom"=>$this->faker->lastName(),
            "Email"=>$this->faker->email(),
            "Phone"=>$this->faker->phoneNumber(),
            "Adress"=>$this->faker->address(),
            "CIN"=>$this->faker->regexify('[A-Z]{2}[0-4]{6}'),
            "Date_naissance"=>$this->faker->date(),
            // "Image"=>$this->faker->imageUrl(true, 'Faker',true),
            'Image'=>$this->faker->imageUrl(640,480),

        ];
    }
}

