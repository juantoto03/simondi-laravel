<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estatuses extends Model
{
    use HasFactory;
    protected $fillable = ['est_nombre'];
}
