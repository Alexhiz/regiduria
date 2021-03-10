<?php

namespace App\Exports;

use App\Models\Band;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\WithHeadings;
class BandsExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings(): array
    {
        return [
            'NOMBRE',
            'CANTIDAD',
            'COLOR',
            'NUMERO DE SERIE',
            'MARCA',
            'OBSERVACION',
            'UBICACION',
            'ESTADO'
        ];
    }
    public function collection()
    {
        return DB::table('bands')
            ->join('conditions', 'conditions.id', '=', 'bands.condition_id')
            ->join('ubications', 'ubications.id', '=', 'bands.ubication_id')
            ->select(['bands.nombre','bands.cantidad','bands.color','bands.num_serie','bands.marca','bands.observacion', 'ubications.nombre as nomUbication', 'conditions.nombre as nomCondition'])
            ->get();
    }
}
