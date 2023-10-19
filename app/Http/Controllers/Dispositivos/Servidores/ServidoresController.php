<?php

namespace App\Http\Controllers\Dispositivos\Servidores;

use App\Models\Servidores;
use App\Models\Modelos;
use App\Models\Estatuses;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use App\Http\Requests\Servidores\PutRequest;
use App\Http\Requests\Servidores\StoreRequest;

class ServidoresController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $servidore = Servidores::paginate(10);

        return view('Dispositivos.Servidores.post.index', compact('servidore'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $modelos = Modelos::pluck('id', 'mod_nombre');
        $estatuses = Estatuses::pluck('id', 'est_nombre');
        $servidore = new Servidores();

        return view('Dispositivos.Servidores.post.create',compact('servidore','modelos','estatuses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        Servidores::create($request->validated());

        return to_route('servidores.index')->with('status',"Registro creado");
    }

    /**
     * Display the specified resource.
     */
    public function show(Servidores $servidore)
    {
        return view('Dispositivos.Servidores.post.show', compact('servidore'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Servidores $servidore)
    {
        $modelos = Modelos::pluck('id', 'mod_nombre');
        $estatuses = Estatuses::pluck('id', 'est_nombre');

        return view('Dispositivos.Servidores.post.edit',compact('servidore','modelos','estatuses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PutRequest $request, Servidores $servidore)
    {
        $servidore->update($request->validated());

        return to_route('servidores.index')->with('status',"Registro actualizado");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Servidores $servidore)
    {
        $servidore->delete();

        return to_route('servidores.index')->with('status',"Registro borrado");
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

                $servidore_alta = Carbon::createFromFormat('Y-m-d', $data[5]);

                $servidore_estado = strtolower($data[6]); // Convierte el estado a minúsculas para ser insensible a mayúsculas y minúsculas

                $estatus = Estatuses::where('est_nombre', $servidore_estado)->first(); // Busca el estado en la tabla "estatuses" por su nombre

                if ($estatus) {
                    $servidore_estatus_id = $estatus->id; // Obtiene el ID correspondiente desde la tabla "estatuses"
                } else {
                    throw new \Exception('El estado no se encuentra en la tabla de estatuses.');
                }

                $servidore_modelo = trim($data[7]);

                $modelo = Modelos::where('mod_nombre', $servidore_modelo)->first();

                if ($modelo) {
                    $servidore_modelo_id = $modelo->id;
                } else {
                    throw new \Exception('El modelo no se encuentra en la tabla de modelos.');
                }

                Servidores::create([
                    'servidor_nombre' => $data[0],
                    'servidor_serial' => $data[1],
                    'servidor_macadd' => $data[2],
                    'servidor_ip' => $data[3],
                    'servidor_firmware' => $data[4],
                    'servidor_alta' => $servidore_alta,
                    'servidor_estatus_id' => $servidore_estatus_id,
                    'servidor_modelo_id' => $servidore_modelo_id,
                ]);
            }
            fclose($handle);
        }
    
        return to_route('servidores.index')->with('status', 'Registros agregados correctamente');
    }
}
