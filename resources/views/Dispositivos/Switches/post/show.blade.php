@extends('Dashboard.layout')

@section('content')
    
    <h1 class="m-8"> SWITCH </h1>

    <div class="text-left">
        <h1>{{ $switch->swi_nombre }}</h1>
        <p>Nombre: {{ $switch->swi_nombre }}</p>
        <p>Número de serie: {{ $switch->swi_serial }}</p>
        <p>Memoria: {{ $switch->swi_memoria }}</p>
        <p>CPU: {{ $switch->swi_cpu }}</p>
        <p>Puertos: {{ $switch->swi_puertos }}</p>
        <p>Mac Address{{ $switch->swi_macadd }}</p>
        <p>IP: {{ $switch->swi_ip }}</p>
        <p>Firnware: {{ $switch->swi_firmware }}</p>
        <p>Modelo: {{ $switch->modelos->mod_nombre }}</p>
        <p>Estatus: {{ $switch->estatuses->est_nombre }}</p>
        <p>Fecha de alta: {{ $switch->swi_alta }}</p>
        <p>Fecha de baja: {{ $switch->swi_baja }}</p>
    </div> 

@stop