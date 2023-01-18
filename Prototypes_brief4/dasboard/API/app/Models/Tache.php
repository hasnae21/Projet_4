<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tache extends Model
{
    use HasFactory;
    protected $table = "tache";
    public $timestamps= false;
    protected $fillable = [
        "Apprenant_id",
        "Apprenant_P_Brief_id",
        "Preparation_brief_id",
        "Preparation_tache_id",
        "Etat",
        "Date_debut",
        "Date_fin",
        "Date_reel_debut",
        "Date_reel_fin",
    ];
}
