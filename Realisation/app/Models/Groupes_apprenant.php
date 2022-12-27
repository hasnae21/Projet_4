<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Preparation_tache;
use App\Models\Apprenant_preparation_brief;
use App\Models\Apprenant;

class Groupes_apprenant extends Model
{
    use HasFactory;

    protected $table = "groupes_apprenant";
    protected $fillable = ["Groupe_id", "Apprenant_id"];
    public $timestamps = true;

    public function groupe()
    {
        return $this->belongsToMany(Groupes::class);
    }
    public function apprenant()
    {
        return $this->belongsToMany(Apprenant::class);
    }
}
