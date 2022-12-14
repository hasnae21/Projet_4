<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Groupes;

class Annee_formation extends Model
{
    use HasFactory;

    protected $table = "annee_formation";
    protected $fillable = ["Annee_scolaire"];
    public $timestamps = true;

    public function anneegroupe(){
        return $this->hasMany(Groupes::class);
    }

}