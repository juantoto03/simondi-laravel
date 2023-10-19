<?php

namespace App\Http\Controllers\Dispositivos\Routers;

use App\Models\Routers;
use App\Models\Modelos;
use App\Http\Controllers\Controller;
use App\Http\Requests\Routers\PutRequest;
use App\Http\Requests\Routers\StoreRequest;
use App\Models\Estatuses;

class RoutersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $router = Routers::paginate(10);

        return view('Dispositivos.Routers.post.index', compact('router'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $modelos = Modelos::pluck('id', 'mod_nombre');
        $estatuses = Estatuses::pluck('id', 'est_nombre');
        $router = new Routers();

        return view('Dispositivos.Routers.post.create',compact('router','modelos','estatuses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        Routers::create($request->validated());

        return to_route('routers.index')->with('status',"Registro creado");
    }

    /**
     * Display the specified resource.
     */
    public function show(Routers $router)
    {
        return view('Dispositivos.Routers.post.show', compact('router'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Routers $router)
    {
        $modelos = Modelos::pluck('id', 'mod_nombre');
        $estatuses = Estatuses::pluck('id', 'est_nombre');

        return view('Dispositivos.Routers.post.edit',compact('router','modelos','estatuses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PutRequest $request, Routers $router)
    {
        $router->update($request->validated());

        return to_route('routers.index')->with('status',"Registro actualizado");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Routers $router)
    {
        $router->delete();

        return to_route('routers.index')->with('status',"Registro borrado");
    }
}
