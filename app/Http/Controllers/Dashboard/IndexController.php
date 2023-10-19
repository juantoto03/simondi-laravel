<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Dashboard.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('Dashboard.show');
    }
}
