<?php

namespace App\Http\Controllers\Dashboard\Campus;

use App\Http\Controllers\Controller;
use App\Models\Norte;
use Illuminate\Http\Request;

class NorteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Dashboard.Campus.Norte.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Dashboard.Campus.Norte.show');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Norte $norte)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Norte $norte)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Norte $norte)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Norte $norte)
    {
        //
    }
}
