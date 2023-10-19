@extends('Dashboard.layout')

@section('content')
    <h1 class="m-8"> ESTATUS </h1>

    <div class="text-left">
        <h1>{{ $estatus->est_nombre }}</h1>
        <p>{{ $estatus->est_nombre }}</p>
    </div>

@stop