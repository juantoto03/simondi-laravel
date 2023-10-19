@extends('Dashboard.layout')

@section('content')
    <h1 class="m-8"> ROUTER </h1>

    <div class="text-left">
        <h1>{{ $core->cor_nombre }}</h1>
        <p>Nombre: {{ $core->cor_nombre }}</p>
        <p>Número de serie: {{ $core->cor_serial }}</p>
        <p>Memoria: {{ $core->cor_memoria }}</p>
        <p>CPU: {{ $core->cor_cpu }}</p>
        <p>Puertos: {{ $core->cor_puertos }}</p>
        <p>Mac Address{{ $core->cor_macadd }}</p>
        <p>IP: {{ $core->cor_ip }}</p>
        <p>Firnware: {{ $core->cor_firmware }}</p>
        <p>Modelo: {{ $core->modelos->mod_nombre }}</p>
        <p>Estatus: {{ $core->estatuses->est_nombre }}</p>
        <p>Fecha de alta: {{ $core->cor_alta }}</p>
        <p>Fecha de baja: {{ $core->cor_baja }}</p>
    </div> 

@stop