<?php

namespace App\Http\Controllers\Dashboard\PowerBI;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UsoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Dashboard.PowerBI.UsoInfra.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('Dashboard.PowerBI.UsoInfra.show');
    }
}
