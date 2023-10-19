<?php

namespace App\Http\Controllers\Dashboard\PowerBI;

use App\Http\Controllers\Controller;
use App\Models\Disponibilidad;
use Illuminate\Http\Request;

class DisponibilidadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Dashboard.PowerBI.Disponibilidad.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Disponibilidad $disponibilidad)
    {
        return view('Dashboard.PowerBI.show');
    }
}
