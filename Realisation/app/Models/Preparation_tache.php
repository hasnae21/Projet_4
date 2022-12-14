<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Preparation_brief;
use App\Models\Apprenant;

class Preparation_tache extends Model
{
    use HasFactory;
    protected $table="preparation_tache";
    protected $fillable=["Nom_tache","Description","Duree","Preparation_brief_id"];
    public $timestamps = true;

    public function tachebrief(){
        return $this->belongsTo(Preparation_brief::class);
    }
    public function tacheapprenant(){
        return $this->hasMany(Apprenant::class);
    }
}
