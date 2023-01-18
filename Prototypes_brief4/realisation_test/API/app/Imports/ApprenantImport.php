<?php

namespace App\Imports;

use App\Models\Apprenant;
use App\Models\PreparationTache;
use Maatwebsite\Excel\Concerns\ToModel;

class ApprenantImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Apprenant([
            'Nom'=>$row[1],
            'Prenom'=>$row[2],
            'Email'=>$row[3],
            'Phone'=>$row[4],
            'Adress'=>$row[4],
            'CIN'=>$row[6],
            'Date_naissance'=>$row[7],
            'Image'=>$row[8]
        ]);
    }
}
