<?php

namespace App\Http\Controllers\Categorias\Modelos;

use App\Models\Tipos;
use App\Models\Marcas;
use App\Models\Modelos;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Modelos\PutRequest;
use App\Http\Requests\Modelos\StoreRequest;

class ModelosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $modelo = Modelos::paginate(10);

        return view('Categorias.Modelos.post.index', compact('modelo'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tipos = Tipos::pluck('id', 'tip_nombre');
        $marcas = Marcas::pluck('id', 'mar_nombre');
        $modelo = new Modelos();

        return view('Categorias.Modelos.post.create',compact('modelo','tipos','marcas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        Modelos::create($request->validated());

        return to_route('modelos.index')->with('status',"Registro creado");
    }

    /**
     * Display the specified resource.
     */
    public function show(Modelos $modelo)
    {
        return view('Categorias.Modelos.post.show', compact('modelo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Modelos $modelo)
    {
        $tipos = Tipos::pluck('id', 'tip_nombre');
        $marcas = Marcas::pluck('id', 'mar_nombre');

        return view('Categorias.Modelos.post.edit', compact('modelo','tipos','marcas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PutRequest $request, Modelos $modelo)
    {
        $modelo->update($request->validated());

        return to_route('modelos.index')->with('status',"Registro actualizado");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Modelos $modelos)
    {
        $modelos->delete();

        return to_route('modelos.index')->with('status',"Registro borrado");
    }
}
