<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Switches extends Model
{
    use HasFactory;
    protected $fillable = ['swi_nombre', 'swi_serial', 'swi_memoria', 'swi_cpu', 'swi_puertos', 'swi_macadd', 'swi_ip', 'swi_firmware', 'swi_alta', 'swi_estatus_id', 'swi_modelo_id'];

    public function modelos()
    {
        return $this->belongsTo(Modelos::class, 'swi_modelo_id');
    }

    public function estatuses()
    {
        return $this->belongsTo(Estatuses::class, 'swi_estatus_id');
    }
}
