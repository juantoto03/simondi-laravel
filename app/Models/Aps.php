<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aps extends Model
{
    use HasFactory;
    protected $fillable = ['ap_nombre', 'ap_serial', 'ap_macadd', 'ap_ip', 'ap_firmware', 'ap_alta', 'ap_estatus_id', 'ap_modelo_id'];

    public function modelos()
    {
        return $this->belongsTo(Modelos::class, 'ap_modelo_id');
    }

    public function estatuses()
    {
        return $this->belongsTo(Estatuses::class, 'ap_estatus_id');
    }
}
