<?php

namespace App\Exports;

use App\Models\Ludoteca;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
class LudotecasExport implements FromCollection, WithHeadings
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
            'TAMAÑO',
            'MARCA',
            'OBSERVACION',
            'UBICACION',
            'ESTADO'
        ];
    }
    public function collection()
    {
        return DB::table('ludotecas')
            ->join('conditions', 'conditions.id', '=', 'ludotecas.condition_id')
            ->join('ubications', 'ubications.id', '=', 'ludotecas.ubication_id')
            ->select(['ludotecas.nombre','ludotecas.cantidad','ludotecas.color','ludotecas.tamano','ludotecas.marca','ludotecas.observacion', 'ubications.nombre as nomUbication', 'conditions.nombre as nomCondition'])
            ->get();
    }
}
