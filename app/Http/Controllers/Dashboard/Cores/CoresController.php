<?php

namespace App\Http\Controllers\Dashboard\Cores;

use App\Models\Cores;
use App\Models\Modelos;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Cores\PutRequest;
use App\Http\Requests\Cores\StoreRequest;
use App\Models\Estatuses;

class CoresController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $core = Cores::paginate(20);

        return view('Dashboard.Cores.post.index', compact('core'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $modelos = Modelos::pluck('id', 'mod_nombre');
        $estatuses = Estatuses::pluck('id', 'est_nombre');
        $core = new Cores();

        return view('Dashboard.Cores.post.create',compact('core','modelos','estatuses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        Cores::create($request->validated());

        return to_route('cores.index')->with('status',"Registro creado");
    }

    /**
     * Display the specified resource.
     */
    public function show(Cores $core)
    {
        return view('Dashboard.Cores.post.show', compact('core'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cores $core)
    {
        $modelos = Modelos::pluck('id', 'mod_nombre');
        $estatuses = Estatuses::pluck('id', 'est_nombre');

        return view('Dashboard.Cores.post.edit',compact('core','modelos','estatuses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PutRequest $request, Cores $core)
    {
        $core->update($request->validated());

        return to_route('cores.index')->with('status',"Registro actualizado");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cores $core)
    {
        $core->delete();

        return to_route('cores.index')->with('status',"Registro borrado");
    }
}
