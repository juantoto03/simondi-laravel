@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-5">
    <div class="bg-white p-5 shadow-md rounded-lg">
        <h1 class="text-2xl font-semibold mb-3">Gráfico de ejemplo</h1>
        <canvas id="myChart" width="400" height="200"></canvas>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('js/chart.js') }}"></script>
<script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar', // Tipo de gráfico (por ejemplo, 'bar', 'line', 'pie', etc.)
        data: {
            labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo'],
            datasets: [{
                label: 'Ventas Mensuales',
                data: [12, 19, 3, 5, 2],
                backgroundColor: 'rgba(75, 192, 192, 0.2)', // Color de fondo
                borderColor: 'rgba(75, 192, 192, 1)', // Color del borde
                borderWidth: 1 // Ancho del borde
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
@endsection
