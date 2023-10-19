<?php

namespace App\Http\Controllers\Dispositivos\Aps;

use App\Models\Aps;
use App\Models\Modelos;
use App\Models\Estatuses;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use App\Http\Requests\Aps\PutRequest;
use App\Http\Requests\Aps\StoreRequest;

class ApsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ap = Aps::paginate(10);

        return view('Dispositivos.Aps.post.index', compact('ap'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $modelos = Modelos::pluck('id', 'mod_nombre');
        $estatuses = Estatuses::pluck('id', 'est_nombre');
        $ap = new Aps();

        return view('Dispositivos.Aps.post.create',compact('ap','modelos','estatuses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        Aps::create($request->validated());

        return to_route('aps.index')->with('status',"Registro creado");
    }

    /**
     * Display the specified resource.
     */
    public function show(Aps $ap)
    {
        return view('Dispositivos.Aps.post.show', compact('ap'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Aps $ap)
    {
        $modelos = Modelos::pluck('id', 'mod_nombre');
        $estatuses = Estatuses::pluck('id', 'est_nombre');

        return view('Dispositivos.Aps.post.edit',compact('ap','modelos','estatuses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PutRequest $request, Aps $ap)
    {
        $ap->update($request->validated());

        return to_route('aps.index')->with('status',"Registro actualizado");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Aps $ap)
    {
        $ap->delete();

        return to_route('aps.index')->with('status',"Registro borrado");
    }
    
    public function importarCSV(StoreRequest $request)
    {
        // Validar y procesar el archivo CSV
        $this->validate($request, [
            'archivo_csv' => 'required|mimes:csv,txt',
        ]);
    
        $archivo = $request->file('archivo_csv');

        // Procesar el archivo CSV y agregar registros a la tabla
        if (($handle = fopen($archivo, 'r')) !== false) {
            $firstRow = true; // Flag para omitir la primera fila
           while (($line = fgets($handle)) !== false) {
                if ($firstRow) {
                    $firstRow = false;
                    continue; // Omitir la primera fila
                }

                $data = explode("\t", $line); // Divide la línea en un arreglo utilizando tabulaciones como delimitador

                $ap_alta = Carbon::createFromFormat('Y-m-d', $data[5]);

                $ap_estado = strtolower($data[6]); // Convierte el estado a minúsculas para ser insensible a mayúsculas y minúsculas

                $estatus = Estatuses::where('est_nombre', $ap_estado)->first(); // Busca el estado en la tabla "estatuses" por su nombre

                if ($estatus) {
                    $ap_estatus_id = $estatus->id; // Obtiene el ID correspondiente desde la tabla "estatuses"
                } else {
                    throw new \Exception('El estado no se encuentra en la tabla de estatuses.');
                }

                $ap_modelo = trim($data[7]);

                //$ap_modelo = strtolower($data[7]);

                //dd($ap_modelo);

                $modelo = Modelos::where('mod_nombre', $ap_modelo)->first();

                if ($modelo) {
                    $ap_modelo_id = $modelo->id;
                } else {
                    throw new \Exception('El modelo no se encuentra en la tabla de modelos.');
                }

                Aps::create([
                    'ap_nombre' => $data[0],
                    'ap_serial' => $data[1],
                    'ap_macadd' => $data[2],
                    'ap_ip' => $data[3],
                    'ap_firmware' => $data[4],
                    'ap_alta' => $ap_alta,
                    'ap_estatus_id' => $ap_estatus_id,
                    'ap_modelo_id' => $ap_modelo_id,
                ]);
            }
            fclose($handle);
        }
    
        return to_route('aps.index')->with('status', 'Registros agregados correctamente');
    }
}
