<?php

namespace App\Exports;

use App\Models\Ubication;
use Maatwebsite\Excel\Concerns\FromCollection;

class UbicationsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Ubication::select(['id','nombre'])->get();
    }
}
