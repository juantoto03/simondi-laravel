<?php

namespace App\Http\Controllers\Dashboard\Estatuses;

use App\Models\Estatuses;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Estatuses\PutRequest;
use App\Http\Requests\Estatuses\StoreRequest;

class EstatusesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $estatuses = Estatuses::paginate(20);

        return view('Dashboard.Estatuses.post.index', compact('estatuses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $estatus = new Estatuses();

        return view('Dashboard.Estatuses.post.create',compact('estatus'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        Estatuses::create($request->validated());

        return to_route('estatuses.index')->with('status',"Registro creado");
    }

    /**
     * Display the specified resource.
     */
    public function show(Estatuses $estatus)
    {
        return view('Dashboard.Estatuses.post.show', compact('estatus'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Estatuses $estatus)
    {
        return view('Dashboard.Estatuses.post.edit',compact('estatus'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PutRequest $request, Estatuses $estatus)
    {
        $estatus->update($request->validated());

        return to_route('estatuses.index')->with('status',"Registro actualizado");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Estatuses $estatus)
    {
        $estatus->delete();

        return to_route('estatuses.index')->with('status',"Registro borrado");
    }
}
