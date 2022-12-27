<?php

namespace Database\Factories;

use App\Models\Apprenant_preparation_brief;
use App\Models\Groupes;
use App\Models\Groupes_preparation_brief;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Groupes_preparation_brief>
 */
class Groupes_preparation_briefFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    //protected $model=Groupes_preparation_brief::class;
    public function definition()
    {  
        $apprenantpreparationbrief=Apprenant_preparation_brief::all()->pluck('id')->toArray();
        $groupe =Groupes::all()->pluck('id')->toArray();
        return [
            "Apprenant_preparation_brief_id"=>$this->faker->randomElement($apprenantpreparationbrief),
            'Groupe_id'=> $this->faker->randomElement($groupe),
            
        ];
    }
}
