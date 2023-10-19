<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Routers extends Model
{
    use HasFactory;
    protected $fillable = ['rou_nombre', 'rou_serial', 'rou_memoria', 'rou_cpu', 'rou_puertos', 'rou_macadd', 'rou_ip', 'rou_firmware', 'rou_alta', 'rou_estatus_id', 'rou_modelo_id'];

    public function modelos()
    {
        return $this->belongsTo(Modelos::class, 'rou_modelo_id');
    }

    public function estatuses()
    {
        return $this->belongsTo(Estatuses::class, 'rou_estatus_id');
    }
}
