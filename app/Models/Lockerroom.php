<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lockerroom extends Model
{
    use HasFactory;
    protected $fillable = [
      'id',
      'nombre',
      'cantidad',
      'material',
      'color',
      'talla',
      'observacion',
      'unit_id',
      'region_id',
      'condition_id',
      'ubication_id'
    ];

    public function unit(){
      return $this->belongsTo(Unit::class);
    }

    public function region(){
      return $this->belongsTo(Region::class);
    }

    public function condition(){
      return $this->belongsTo(Condition::class);
    }

    public function ubication(){
      return $this->belongsTo(Ubication::class);
    }
}
