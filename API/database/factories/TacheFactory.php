<?php
namespace Database\Factories;

use App\Models\PreparationTache;
use App\Models\PreparationBrief;
use App\Models\Brief;
use App\Models\Tache;
use App\Models\Apprenant;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\tache>
 */
class TacheFactory extends Factory
{
    protected $model=Tache::class;
    public function definition()
    {
        $preparationTache = PreparationTache::all()->pluck('id')->toArray();
        $preparationBrief = PreparationBrief::all()->pluck('id')->toArray();
        $apprenantPreparationBrief = Brief::all()->pluck('id')->toArray();
        $apprenant = Apprenant::all()->pluck('id')->toArray();

        return [
            "Apprenant_id"=>$this->faker->randomElement($apprenant),
            "Apprenant_P_Brief_id"=>$this->faker->randomElement($apprenantPreparationBrief),
            "Preparation_brief_id"=>$this->faker->randomElement($preparationBrief),
            "Preparation_tache_id"=>$this->faker->randomElement($preparationTache),
            "Etat"=>$this->faker->randomElement(['en pause', 'terminer', 'en cours']) ,
            "Date_debut"=>$this->faker->date(),
            "Date_fin"=>$this->faker->date(),
            "Date_reel_debut"=>$this->faker->date(),
            "Date_reel_fin"=>$this->faker->date(),
        ];
    }
}
