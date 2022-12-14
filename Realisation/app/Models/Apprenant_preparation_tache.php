<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Preparation_tache;
use App\Models\Apprenant_preparation_brief;
use App\Models\Apprenant;

class Apprenant_preparation_tache extends Model
{
    use HasFactory;
    protected $table = "apprenant_preparation_tache";
    protected $fillable = ["Etat",	"date_debut", 	"date_fin",	"Preparation_tache_id",	"Apprenant_id",	"Apprenant_P_Brief_id"];
    public $timestamps = true;

    public function preparation_tache(){
        return $this->belongsToMany(Preparation_tache::class);
    }
       public function apprenant_preparation_brief(){
        return $this->belongsToMany(Apprenant_preparation_brief::class);
    }
       public function apprenant(){
        return $this->belongsToMany(Apprenant::class);
    }
}