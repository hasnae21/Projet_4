<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Preparation_tache;
use App\Models\Formateur;
use App\Models\Apprenant;

class Preparation_brief extends Model
{
    use HasFactory;
    protected $table="preparation_brief";
    protected $fillable=["Nom_du_brief","Description","Duree","Formateur_id"];
    public $timestamps = true;

    public function briefformateur(){
        return $this->belongsTo(Formateur::class);
    }
    public function briefapprenant(){
        return $this->hasMany(Apprenant::class);
    }
    public function brieftache(){
        return $this->hasMany(Preparation_tache::class);
    }
}
