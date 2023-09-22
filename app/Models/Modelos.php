<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modelos extends Model
{
    use HasFactory;
    protected $fillable = ['mod_nombre', 'mod_tipo_id', 'mod_marca_id'];

    public function tipos()
    {
        return $this->belongsTo(Tipos::class, 'mod_tipo_id');
    }

    public function marcas()
    {
        return $this->belongsTo(Marcas::class, 'mod_marca_id');
    }
}
