<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Band extends Model
{
    use HasFactory;
    protected $fillable = [
      'id',
      'nombre',
      'cantidad',
      'num_serie',
      'color',
      'marca',
      'observacion',
      'condition_id',
      'ubication_id'
    ];

    public function condition(){
      return $this->belongsTo(Condition::class);
    }

    public function ubication(){
      return $this->belongsTo(Ubication::class);
    }
}
