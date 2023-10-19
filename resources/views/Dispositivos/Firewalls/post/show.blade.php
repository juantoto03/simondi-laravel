@extends('Dashboard.layout')

@section('content')
    
    <h1 class="m-8"> FIREWALL </h1>

    <div class="text-left">
        <h1>{{ $firewall->fir_nombre }}</h1>
        <p>Nombre: {{ $firewall->fir_nombre }}</p>
        <p>Número de serie: {{ $firewall->fir_serial }}</p>
        <p>Memoria: {{ $firewall->fir_memoria }}</p>
        <p>CPU: {{ $firewall->fir_cpu }}</p>
        <p>Puertos: {{ $firewall->fir_puertos }}</p>
        <p>Mac Address{{ $firewall->fir_macadd }}</p>
        <p>IP: {{ $firewall->fir_ip }}</p>
        <p>Firnware: {{ $firewall->fir_firmware }}</p>
        <p>Modelo: {{ $firewall->modelos->mod_nombre }}</p>
        <p>Estatus: {{ $firewall->estatuses->est_nombre }}</p>
        <p>Fecha de alta: {{ $firewall->fir_alta }}</p>
        <p>Fecha de baja: {{ $firewall->fir_baja }}</p>
    </div> 

@stop