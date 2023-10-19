@extends('Dashboard.layout')

@section('content')

    <h1 class="m-8"> MODELO </h1>

    <div class="text-left">
        <h1>{{ $modelo->mod_nombre }}</h1>
        <p> Tipo: {{ $modelo->tipos->tip_nombre }} </p>
        <p> Marca: {{ $modelo->marcas->mar_nombre }} </p>
    </div>  

@stop