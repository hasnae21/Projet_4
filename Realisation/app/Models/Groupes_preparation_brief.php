<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Preparation_tache;
use App\Models\Apprenant_preparation_brief;
use App\Models\Apprenant;

class Groupes_preparation_brief extends Model
{
    use HasFactory;
    protected $table="groupes_preparation_brief";
    protected $fillable=["Apprenant_preparation_brief_id", "Groupe_id"];
    public $timestamps = true;

}
