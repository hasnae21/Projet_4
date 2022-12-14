<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Groupes;
use App\Models\Preparation_brief;

class Formateur extends Model
{
    use HasFactory;

    protected $table = "formateur";
    protected $fillable = [ "Nom_formateur","Prenom_formateur","Email_formateur","Phone","Adress","CIN","Image" ];
    public $timestamps = true;

    public function formateurgroupe(){
        return $this->hasOne(Groupes::class);
    }
    public function formateurbrief(){
        return $this->hasMany(Preparation_brief::class);
    }
}
 