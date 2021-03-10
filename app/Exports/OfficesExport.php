<?php

namespace App\Exports;

use App\Models\Office;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\WithHeadings;

class OfficesExport implements FromCollection,WithHeadings
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
            'MODELO',
            'MARCA',
            'OBSERVACION',
            'UBICACION',
            'ESTADO'
        ];
    }
    public function collection()
    {
        return DB::table('offices')
            ->join('conditions', 'conditions.id', '=', 'offices.condition_id')
            ->join('ubications', 'ubications.id', '=', 'offices.ubication_id')
            ->select(['offices.nombre','offices.cantidad','offices.color','offices.num_serie','offices.modelo','offices.marca','offices.observacion', 'ubications.nombre as nomUbication', 'conditions.nombre as nomCondition'])
            ->get();
    }
}
