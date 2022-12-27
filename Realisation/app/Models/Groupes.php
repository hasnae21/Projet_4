<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Apprenant;
use App\Models\Formateur;
use App\Models\Annee_formation;

class Groupes extends Model
{
    use HasFactory;
    protected $table="groupes";
    protected $fillable=["Nom_groupe","Logo","Annee_formation_id","Formateur_id"];
    public $timestamps = true;

    public function groupeapprenant(){
        return $this->hasMany(Apprenant::class);
    }
    public function groupeformateur(){
        return $this->hasOne(Formateur::class);
    }
    public function groupeannee(){
        return $this->belongsTo(Annee_formation::class);
   }
}