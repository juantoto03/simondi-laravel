<?php

namespace App\Http\Controllers\Dashboard\Consumo;

use Carbon\Carbon;
use App\Models\Consumos;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ConsumoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $consumoNorte = null;
        $consumoSur = null;

        $labels = null;
        $data = null;
        $dataNorte = null;
        $dataSur = null;

        $fechaActual = Carbon::now()->setTimezone('-06:00');
        $horaActual = $fechaActual->copy()->format('H') . ':00:00';  // Obtener la hora actual y ajustarla a una hora completa
        $horaAnterior = $fechaActual->copy()->subHours(2)->format('H') . ':00:00'; // Calcular la hora anterior

        // Verificar si se envió una solicitud de filtrado
        if ($request->has('fecha_inicio')) {
            $fechaInicioInput = $request->input('fecha_inicio');
            $fechaFinalInput = $request->input('fecha_final');

            // Separar la fecha y la hora usando la función explode()
            $fechaInicioArray = explode('T', $fechaInicioInput);
            $fechaFinalArray = explode('T', $fechaFinalInput);

            // Crear objetos Carbon a partir de las partes separadas
            $FechaInicio = \Carbon\Carbon::parse($fechaInicioArray[0]);
            $HoraInicio = \Carbon\Carbon::parse($fechaInicioArray[1]);

            $FechaFinal = \Carbon\Carbon::parse($fechaFinalArray[0]);
            $HoraFinal = \Carbon\Carbon::parse($fechaFinalArray[1]);

            // Ahora puedes acceder a la fecha y la hora por separado
            $fechaInicio = $FechaInicio->toDateString(); // Obtiene la fecha como 'YYYY-MM-DD'
            $horaInicio = $HoraInicio->toTimeString(); // Obtiene la hora como 'HH:MM:SS'

            $fechaFinal = $FechaFinal->toDateString(); // Obtiene la fecha como 'YYYY-MM-DD'
            $horaFinal = $HoraFinal->toTimeString(); // Obtiene la hora como 'HH:MM:SS'

            //dd($fechaInicio, $horaInicio, $fechaFinal, $horaFinal);
            
            // Realizar la consulta para filtrar los datos por fecha y hora
            $consumo = Consumos::where('con_fecha', '=', $fechaInicio)
                ->where('con_fecha', '>=', $fechaInicio)
                ->where('con_fecha', '<', $fechaFinal)
                ->groupBy('con_hora') // Agrupar por hora
                ->selectRaw('con_hora, SUM(con_consumo) as con_consumo_sum')
                ->get();

        } elseif ($request->has('campus')){
            $campus = $request->input('campus');

            $horaActual = $fechaActual->copy()->format('H') . ':00:00'; // Obtener la hora actual y ajustarla a una hora completa
            $horaAnterior = $fechaActual->copy()->subHour()->format('H') . ':00:00'; // Calcular la hora anterior

            $consumo = Consumos::where('con_fecha', '=', $fechaActual->toDateString())
                ->where('con_hora', '>=', $horaAnterior)
                ->where('con_hora', '<', $horaActual)
                ->where('con_campus', '=', $campus)
                ->groupBy('con_hora') // Agrupar por hora
                ->selectRaw('con_hora, SUM(con_consumo) as con_consumo_sum')
                ->get();
            
                // Consultas específicas para Norte y Sur
                if ($campus === 'Norte') {
                    $consumoNorte = $consumo;
                } elseif ($campus === 'Sur') {
                    $consumoSur = $consumo;
                }
        }else {
            $consumo = Consumos::where('con_fecha', '=', $fechaActual->toDateString())
                ->where('con_hora', '>=', $horaAnterior)
                ->where('con_hora', '<', $horaActual)
                ->groupBy('con_hora') // Agrupar por hora
                ->selectRaw('con_hora, SUM(con_consumo) as con_consumo_sum')
                ->get();
            
            $consumoNorte = Consumos::where('con_fecha', '=', $fechaActual->toDateString())
                ->where('con_hora', '>=', $horaAnterior)
                ->where('con_hora', '<', $horaActual)
                ->where('con_campus', '=', 'Norte') // Asegúrate de tener una columna 'campus' en tu base de datos
                ->groupBy('con_hora') // Agrupar por hora
                ->selectRaw('con_hora, SUM(con_consumo) as con_consumo_sum')
                ->get();

            $consumoSur = Consumos::where('con_fecha', '=', $fechaActual->toDateString())
                ->where('con_hora', '>=', $horaAnterior)
                ->where('con_hora', '<', $horaActual)
                ->where('con_campus', '=', 'Sur') // Asegúrate de tener una columna 'campus' en tu base de datos
                ->groupBy('con_hora') // Agrupar por hora
                ->selectRaw('con_hora, SUM(con_consumo) as con_consumo_sum')
                ->get();
        }

        // Convertir los datos filtrados en un formato adecuado para el gráfico
        $labels = $consumo->pluck('con_hora')->map(function ($hora) {
            return Carbon::parse($hora)->format('H:i'); // Hora:minutos
        });

        if ($consumo) {
            $data = $consumo->pluck('con_consumo_sum');
        }

        if ($consumoNorte) {
            $dataNorte = $consumoNorte->pluck('con_consumo_sum');
        }

        if ($consumoSur) {
            $dataSur = $consumoSur->pluck('con_consumo_sum');
        }

        return view('Dashboard.Consumo.index', compact('labels', 'data', 'dataNorte', 'dataSur'));
    }

    // ...

    public function filterConsumo(Request $request)
    {
        // Realizar la lógica de filtrado aquí
    }
    /**
     * Display the specified resource.
     */
    public function show(Consumos $consumo)
    {
        //
    }
}
