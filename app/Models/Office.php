<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Office extends Model
{
    use HasFactory;
    protected $fillable = [
      'id',
      'nombre',
      'cantidad',
      'caracteristica',
      'color',
      'num_serie',
      'marca',
      'modelo',
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
