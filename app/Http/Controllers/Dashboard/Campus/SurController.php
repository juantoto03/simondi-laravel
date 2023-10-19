<?php

namespace App\Http\Controllers\Dashboard\Campus;

use App\Http\Controllers\Controller;
use App\Models\Sur;
use Illuminate\Http\Request;

class SurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Dashboard.Campus.Sur.index');
    }

        /**
     * Display the specified resource.
     */
    public function show(Sur $sur)
    {
        return view('Dashboard.Campus.Sur.show');
    }
}
