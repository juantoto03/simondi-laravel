<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Firewalls extends Model
{
    use HasFactory;
    protected $fillable = ['fir_nombre', 'fir_serial', 'fir_memoria', 'fir_cpu', 'fir_puertos', 'fir_macadd', 'fir_ip', 'fir_firmware', 'fir_alta', 'fir_estatus_id', 'fir_modelo_id'];

    public function modelos()
    {
        return $this->belongsTo(Modelos::class, 'fir_modelo_id');
    }

    public function estatuses()
    {
        return $this->belongsTo(Estatuses::class, 'fir_estatus_id');
    }
}