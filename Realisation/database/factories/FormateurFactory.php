<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use \App\Models\Formateur;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Formateur>
 */
class FormateurFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model=Formateur::class;
    public function definition()
    {
        return [
            // // 'Image'=>$this->faker->image(storage_path('app/public/myimage'),width:50,height:50,category:null,fullPath:false),
            // 'Image'=>$this->faker->imageUrl(640,480),
            
            "Nom_formateur"=>$this->faker->firstName(),
            "Prenom_formateur"=>$this->faker->lastName(),
            "Email_formateur"=>$this->faker->email(),
            "Phone"=>$this->faker->phoneNumber(),
            "Adress"=>$this->faker->address(),
            "CIN"=>$this->faker->regexify('[A-Z]{2}[0-4]{6}'),
            // "Image"=>$this->faker->imageUrl(true, 'Faker',true),
            'Image'=>$this->faker->imageUrl(640,480),
        ];
    }
}
