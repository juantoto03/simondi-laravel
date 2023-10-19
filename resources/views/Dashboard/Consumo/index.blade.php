@extends('Dashboard.layout')

@section('content')
    <h3 class="my-4 text-[1.75rem] font-medium leading-[1.2]"> Consumo Internet </h3>

    <div class="flex">
        <div class="w-5/6 p-4">
            <div class="bg-gray-100 p-4 rounded shadow-2xl">
                <h5 class="my-4 text-[1.75rem] font-medium leading-[1.2]">
                    @if(request()->has('campus'))
                        @if(request('campus') === 'Norte')
                            Trafico de Campus Norte
                        @elseif(request('campus') === 'Sur')
                            Trafico de Campus Sur
                        @endif
                    @else
                        Trafico de Campus Norte y Campus Sur
                    @endif
                </h5>

                @if ($labels && $data)
                <div class="mx-auto w-auto overflow-hidden">
                    <canvas id="myChart"></canvas>
                </div>
                @else
                <p>No hay datos disponibles para mostrar el gráfico.</p>
                @endif
            </div>
        </div>
        
        <div class="w-1/6 p-4 text-left">
            <h4 class="my-4 text-[1.25rem] font-medium leading-[1.2]">Filtro por campus:</h4>
            <div class="text-center">
                <a href="{{ route('consumo.index', ['campus' => 'Norte']) }}" class="w-16 btn btn-primary mb-2">Norte</a>
                <a href="{{ route('consumo.index', ['campus' => 'Sur']) }}" class="w-16 btn btn-primary mb-2">Sur</a>
            </div>
            <div class="border-b mb-2"></div> <!-- Separador -->
            <div class="mb-4">
                <h4 class="my-4 text-[1.25rem] font-medium leading-[1.2]">Filtro por fecha:</h4>
                <form method="GET" action="{{ route('consumo.index') }}">
                    @csrf
                    <div class="input-group mb-3">
                        <label for="fecha_hora">Inicio:</label>
                        <input type="datetime-local" id="fecha_inicio" name="fecha_inicio" class="form-control" style="width: 150px;">
                    </div>
                    <div class="input-group mb-3">
                        <label for="fecha_hora">Final:</label>
                        <input type="datetime-local" id="fecha_final" name="fecha_final" class="form-control" style="width: 150px;">
                    </div>
                    <div class="text-center">
                        <button type="submit" class="w-20 btn btn-primary">Filtar</button>
                    </div>
                </form>
            </div>
            <div class="border-b mb-2"></div> <!-- Separador -->
            <div class="mb-4 text-center">
                <a href="{{ route('consumo.index') }}" class="w-40 btn btn-primary">Borrar filtros</a>
            </div>
        </div>
    </div>

    <script>
        const ctx = document.getElementById('myChart');

        const labels = {!! json_encode($labels) !!}; // Convierte la variable de PHP a JavaScript
        const data = {!! json_encode($data) !!};
        const dataNorte = {!! json_encode($dataNorte) !!};
        const dataSur = {!! json_encode($dataSur) !!};

        new Chart(ctx, {
            type: 'line',
            data: {
            labels: labels,
            datasets: [
                {
                    label: 'Total',
                    data: data,
                    borderColor: 'gray',
                    borderWidth: 1
                },
                {
                    label: 'Campus Norte',
                    data: dataNorte,
                    borderColor: 'orange',
                    borderWidth: 1
                },
                {
                    label: 'Campus Sur',
                    data: dataSur,
                    borderColor: 'purple',
                    borderWidth: 1
                }
            ]
            },
            options: {
                animations: {
                    tension: {
                        duration: 1000,
                        easing: 'linear',
                        from: 0.7,
                        to: 0.2,
                        loop: true
                    }
                },
            scales: {
                x: {
                    title: {
                        display: true,
                        text: 'Tiempo'
                    }
                },
                y: {
                    title: {
                        display: true,
                        text: 'mbyts / segundo'
                    },
                    beginAtZero: true
                }
            }
            }
        });
    </script>
    
@stop
