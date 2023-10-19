<?php

namespace App\Http\Controllers\Dispositivos\Firewalls;

use App\Models\Firewalls;
use App\Models\Modelos;
use App\Models\Estatuses;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use App\Http\Requests\Firewalls\PutRequest;
use App\Http\Requests\Firewalls\StoreRequest;

class FirewallsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $firewall = Firewalls::paginate(10);

        return view('Dispositivos.Firewalls.post.index', compact('firewall'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $modelos = Modelos::pluck('id', 'mod_nombre');
        $estatuses = Estatuses::pluck('id', 'est_nombre');
        $firewall = new Firewalls();

        return view('Dispositivos.Firewalls.post.create',compact('firewall','modelos','estatuses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        Firewalls::create($request->validated());

        return to_route('firewalls.index')->with('status',"Registro creado");
    }

    /**
     * Display the specified resource.
     */
    public function show(Firewalls $firewall)
    {
        return view('Dispositivos.Firewalls.post.show', compact('firewall'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Firewalls $firewall)
    {
        $modelos = Modelos::pluck('id', 'mod_nombre');
        $estatuses = Estatuses::pluck('id', 'est_nombre');

        return view('Dispositivos.Firewalls.post.edit',compact('firewall','modelos','estatuses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PutRequest $request, Firewalls $firewall)
    {
        $firewall->update($request->validated());

        return to_route('firewalls.index')->with('status',"Registro actualizado");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Firewalls $firewall)
    {
        $firewall->delete();

        return to_route('firewalls.index')->with('status',"Registro borrado");
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

                $firewall_alta = Carbon::createFromFormat('Y-m-d', $data[5]);

                $firewall_estado = strtolower($data[6]); // Convierte el estado a minúsculas para ser insensible a mayúsculas y minúsculas

                $estatus = Estatuses::where('est_nombre', $firewall_estado)->first(); // Busca el estado en la tabla "estatuses" por su nombre

                if ($estatus) {
                    $firewall_estatus_id = $estatus->id; // Obtiene el ID correspondiente desde la tabla "estatuses"
                } else {
                    throw new \Exception('El estado no se encuentra en la tabla de estatuses.');
                }

                $firewall_modelo = trim($data[7]);

                $modelo = Modelos::where('mod_nombre', $firewall_modelo)->first();

                if ($modelo) {
                    $firewall_modelo_id = $modelo->id;
                } else {
                    throw new \Exception('El modelo no se encuentra en la tabla de modelos.');
                }

                Firewalls::create([
                    'firewall_nombre' => $data[0],
                    'firewall_serial' => $data[1],
                    'firewall_macadd' => $data[2],
                    'firewall_ip' => $data[3],
                    'firewall_firmware' => $data[4],
                    'firewall_alta' => $firewall_alta,
                    'firewall_estatus_id' => $firewall_estatus_id,
                    'firewall_modelo_id' => $firewall_modelo_id,
                ]);
            }
            fclose($handle);
        }
    
        return to_route('firewalls.index')->with('status', 'Registros agregados correctamente');
    }
}
