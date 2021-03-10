<?php

namespace App\Exports;

use App\Models\Lockerroom;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\WithHeadings;
class LockerroomsExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings(): array
    {
        return [
            'NOMBRE',
            'CANTIDAD',
            'MATERIAL',
            'COLOR',
            'OBSERVACION',
            'UNIDAD',
            'REGION',
            'UBICACION',
            'ESTADO'
        ];
    }
    public function collection()
    {
        return DB::table('lockerrooms')
            ->join('units', 'units.id', '=', 'lockerrooms.unit_id')
            ->join('regions', 'regions.id', '=', 'lockerrooms.region_id')
            ->join('conditions', 'conditions.id', '=', 'lockerrooms.condition_id')
            ->join('ubications', 'ubications.id', '=', 'lockerrooms.ubication_id')
            ->select(['lockerrooms.nombre','lockerrooms.cantidad','lockerrooms.material','lockerrooms.color','lockerrooms.observacion','units.nombre as nomUnit', 'regions.nombre as nomRegion', 'ubications.nombre as nomUbication', 'conditions.nombre as nomCondition'])
            ->get();
    }
}
