<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Preparation_brief;
use App\Models\Apprenant;

class Apprenant_preparation_brief extends Model
{
    use HasFactory;

    protected $table = "apprenant_preparation_brief";
    protected $fillable = ["Date_affectation", "Preparation_brief_id", "Apprenant_id"];
    public $timestamps = true;

    public function apprenant(){
        return $this->belongsToMany(Apprenant::class);
    }
    public function preparation_brief(){
        return $this->belongsToMany(Preparation_brief::class);
    }

}
