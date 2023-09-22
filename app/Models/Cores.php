<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cores extends Model
{
    use HasFactory;
    protected $fillable = ['cor_nombre', 'cor_serial', 'cor_memoria', 'cor_cpu', 'cor_puertos', 'cor_macadd', 'cor_ip', 'cor_firmware', 'cor_alta', 'cor_estatus_id', 'cor_modelo_id'];

    public function modelos()
    {
        return $this->belongsTo(Modelos::class, 'cor_modelo_id');
    }

    public function estatuses()
    {
        return $this->belongsTo(Estatuses::class, 'cor_estatus_id');
    }
}
