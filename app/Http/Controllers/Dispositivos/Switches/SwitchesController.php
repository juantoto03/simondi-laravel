<?php

namespace App\Http\Controllers\Dispositivos\Switches;

use App\Models\Switches;
use App\Models\Modelos;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Switches\PutRequest;
use App\Http\Requests\Switches\StoreRequest;
use App\Models\Estatuses;

class SwitchesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $switch = Switches::paginate(10);

        return view('Dispositivos.Switches.post.index', compact('switch'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $modelos = Modelos::pluck('id', 'mod_nombre');
        $estatuses = Estatuses::pluck('id', 'est_nombre');
        $switch = new Switches();

        return view('Dispositivos.Switches.post.create',compact('switch','modelos','estatuses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        Switches::create($request->validated());

        return to_route('switches.index')->with('status',"Registro creado");
    }

    /**
     * Display the specified resource.
     */
    public function show(Switches $switch)
    {
        return view('Dispositivos.Switches.post.show', compact('switch'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Switches $switch)
    {
        $modelos = Modelos::pluck('id', 'mod_nombre');
        $estatuses = Estatuses::pluck('id', 'est_nombre');

        return view('Dispositivos.Switches.post.edit',compact('switch','modelos','estatuses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PutRequest $request, Switches $switch)
    {
        $switch->update($request->validated());

        return to_route('switches.index')->with('status',"Registro actualizado");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Switches $switch)
    {
        $switch->delete();

        return to_route('switches.index')->with('status',"Registro borrado");
    }
}
