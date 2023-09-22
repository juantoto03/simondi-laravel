<?php

namespace App\Http\Controllers\Dashboard\Tipos;

use App\Models\Tipos;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Tipos\PutRequest;
use App\Http\Requests\Tipos\StoreRequest;

class TiposController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tipos = Tipos::paginate(20);

        return view('Dashboard.Tipos.post.index', compact('tipos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tipo = new Tipos();

        return view('Dashboard.Tipos.post.create',compact('tipo'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        Tipos::create($request->validated());

        return to_route('tipos.index')->with('status',"Registro creado");
    }

    /**
     * Display the specified resource.
     */
    public function show(Tipos $tipo)
    {
        return view('Dashboard.Tipos.post.show', compact('tipo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tipos $tipo)
    {
        return view('Dashboard.Tipos.post.edit', compact('tipo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PutRequest $request, Tipos $tipo)
    {
        $tipo->update($request->validated());

        return to_route('tipos.index')->with('status',"Registro actualizado");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tipos $tipo)
    {
        $tipo->delete();

        return to_route('tipos.index')->with('status',"Registro borrado");
    }
}
