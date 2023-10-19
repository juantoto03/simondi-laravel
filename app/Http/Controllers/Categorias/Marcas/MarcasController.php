<?php

namespace App\Http\Controllers\Categorias\Marcas;

use App\Models\Marcas;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Marcas\PutRequest;
use App\Http\Requests\Marcas\StoreRequest;

class MarcasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $marca = Marcas::paginate(10);

        return view('Categorias.Marcas.post.index', compact('marca'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $marca = new Marcas();

        return view('Categorias.Marcas.post.create',compact('marca'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        Marcas::create($request->validated());

        return to_route('marcas.index')->with('status',"Registro creado");
    }

    /**
     * Display the specified resource.
     */
    public function show(Marcas $marca)
    {
        return view('Categorias.Marcas.post.show', compact('marca'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Marcas $marca)
    {
        return view('Categorias.Marcas.post.edit', compact('marca'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PutRequest $request, Marcas $marca)
    {
        $marca->update($request->validated());

        return to_route('marcas.index')->with('status',"Registro actualizado");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Marcas $marca)
    {
        $marca->delete();

        return to_route('marcas.index')->with('status',"Registro borrado");
    }
}
