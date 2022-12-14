<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Preparation_brief;
use App\Models\Groupes;
use App\Models\Preparation_tache;

class Apprenant extends Model
{
    use HasFactory;
    
    protected $table = "apprenant";
    protected $fillable = ["Nom","Prenom","Email","Phone","Adress","CIN","Date_naissance","Image"];
    public $timestamps = true;

    public function apprenantbrief(){
        return $this->hasMany(Preparation_brief::class);
    }
    public function apprenantgroupe(){
        return $this->hasMany(Groupes::class);
    }
    public function apprenanttache(){
        return $this->hasMany(Preparation_tache::class);
    }

}
