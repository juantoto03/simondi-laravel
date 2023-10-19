@extends('Dashboard.layout')

@section('content')
    <h3 class="my-4 text-[1.75rem] font-medium leading-[1.2]">
        @if(request()->has('campus'))
            @if(request('campus') === 'Norte')
                Consumo Internet - Campus Norte
            @elseif(request('campus') === 'Sur')
                Consumo Internet - Campus Sur
            @else
                Consumo Internet
            @endif
        @else
            Consumo Internet
        @endif
    </h3>

    <form method="GET" action="{{ route('consumo.index') }}">
        @csrf
        <label for="fecha_hora">Selecciona una fecha y hora:</label>
        <input type="datetime-local" name="fecha_hora">
        <button type="submit">Filtrar</button>
    </form>

    <div class="mb-4">
        <h4>Campus:</h4>
        <a href="{{ route('consumo.index', ['campus' => 'Norte']) }}" class="btn btn-upload">Norte</a>
        <a href="{{ route('consumo.index', ['campus' => 'Sur']) }}" class="btn btn-upload">Sur</a>
        <!-- Agrega enlaces para otros campus si es necesario -->
    </div>

    <div class="bg-gray-100 p-4 rounded shadow-md">
        <div class="mx-auto w-auto overflow-hidden">
            <canvas
                id="myChart"
                data-te-chart="line"
                data-te-dataset-label="Trafico"
                data-te-labels="{{ $labels }}"
                data-te-dataset-data="{{ $data }}">
            </canvas>
        </div>
    </div>

    <script>
        // Obtén los datos de los atributos personalizados
        var chartType = document.querySelector('canvas').getAttribute('data-te-chart');
        var datasetLabel = document.querySelector('canvas').getAttribute('data-te-dataset-label');
        var labels = JSON.parse(document.querySelector('canvas').getAttribute('data-te-labels'));
        var datasetData = JSON.parse(document.querySelector('canvas').getAttribute('data-te-dataset-data'));

        // Configura y renderiza el gráfico con Chart.js
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: chartType,
            data: {
                labels: JSON.parse(labels),
                datasets: [{
                    label: datasetLabel,
                    data: JSON.parse(datasetData),
                    borderColor: 'blue',
                    fill: false
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>

@stop