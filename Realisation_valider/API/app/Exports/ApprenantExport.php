<?php

namespace App\Exports;

use App\Models\Apprenant;
use App\Models\PreparationTache;
use Maatwebsite\Excel\Concerns\FromCollection;

class ApprenantExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Apprenant::all();
    }
}
