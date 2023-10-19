@extends('Dashboard.layout')

@section('content')
    
    <h1 class="m-8"> PUNTO DE ACCESO</h1>

    <div class="text-left">
        <h1>{{ $ap->ap_nombre }}</h1>
        <p>Nombre: {{ $ap->ap_nombre }}</p>
        <p>Número de serie: {{ $ap->ap_serial }}</p>
        <p>Mac Address{{ $ap->ap_macadd }}</p>
        <p>IP: {{ $ap->ap_ip }}</p>
        <p>Firnware: {{ $ap->ap_firmware }}</p>
        <p>Modelo: {{ $ap->modelos->mod_nombre }}</p>
        <p>Estatus: {{ $ap->estatuses->est_nombre }}</p>
        <p>Fecha de alta: {{ $ap->ap_alta }}</p>
        <p>Fecha de baja: {{ $ap->ap_baja }}</p>
    </div> 

@stop