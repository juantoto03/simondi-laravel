@extends('Dashboard.layout')

@section('content')
    
    <h1 class="m-8"> SERVIDOR </h1>

    <div class="text-left">
        <h1>{{ $servidore->ser_nombre }}</h1>
        <p>Nombre: {{ $servidore->ser_nombre }}</p>
        <p>Número de serie: {{ $servidore->ser_serial }}</p>   
        <p>Mac Address{{ $servidore->ser_macadd }}</p>
        <p>IP: {{ $servidore->ser_ip }}</p>
        <p>Sitema Operativo: {{ $servidore->ser_so }}</p>
        <p>Modelo: {{ $servidore->modelos->mod_nombre }}</p>
        <p>Estatus: {{ $servidore->estatuses->est_nombre }}</p>
        <p>Fecha de alta: {{ $servidore->ser_alta }}</p>
        <p>Fecha de baja: {{ $servidore->ser_baja }}</p>
    </div> 

@stop