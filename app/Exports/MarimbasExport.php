<?php

namespace App\Exports;

use App\Models\Marimba;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\WithHeadings;
class MarimbasExport implements FromCollection, WithHeadings
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
            'TAMAÑO',
            'MARCA',
            'OBSERVACION',
            'UBICACION',
            'ESTADO'
        ];
    }
    public function collection()
    {
        return DB::table('marimbas')
            ->join('conditions', 'conditions.id', '=', 'marimbas.condition_id')
            ->join('ubications', 'ubications.id', '=', 'marimbas.ubication_id')
            ->select(['marimbas.nombre','marimbas.cantidad','marimbas.color','marimbas.num_serie','marimbas.tamano','marimbas.marca','marimbas.observacion', 'ubications.nombre as nomUbication', 'conditions.nombre as nomCondition'])
            ->get();
    }
}
