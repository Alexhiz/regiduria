<?php

namespace App\Exports;

use App\Models\Condition;
use Maatwebsite\Excel\Concerns\FromCollection;
class ConditionsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Condition::select(['id','nombre'])->get();
    }
}
