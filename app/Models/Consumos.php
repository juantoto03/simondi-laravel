<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consumos extends Model
{
    use HasFactory;
    protected $fillable = ['con_hora', 'con_dia', 'con_semana', 'con_mes', 'con_ano', 'con_fecha', 'con_enlace_id', 'con_consumo'];

    public function enlaces()
    {
        return $this->belongsTo(Enlaces::class, 'con_enlace_id');
    }
}
