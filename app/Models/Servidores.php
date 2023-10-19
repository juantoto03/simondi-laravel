<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servidores extends Model
{
    use HasFactory;
    protected $fillable = ['ser_nombre', 'ser_serial', 'ser_macadd', 'ser_ip', 'ser_so', 'ser_alta', 'ser_baja', 'ser_estatus_id', 'ser_modelo_id'];

    public function modelos()
    {
        return $this->belongsTo(Modelos::class, 'ser_modelo_id');
    }

    public function estatuses()
    {
        return $this->belongsTo(Estatuses::class, 'ser_estatus_id');
    }
}