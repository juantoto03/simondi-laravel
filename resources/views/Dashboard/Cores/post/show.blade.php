@extends('Dashboard.layout')

@section('content')
    
    <h1>{{ $core->cor_nombre }}</h1>

    <p>{{ $core->cor_nombre }}</p>

    <p>{{ $core->cor_serial }}</p>
    
    <p>{{ $core->cor_memoria }}</p>

    <p>{{ $core->cor_cpu }}</p>

    <p>{{ $core->cor_puertos }}</p>

    <p>{{ $core->cor_macadd }}</p>

    <p>{{ $core->cor_ip }}</p>

    <p>{{ $core->cor_firmware }}</p>

    <p>{{ $core->modelos->mod_nombre }}</p>

    <p>{{ $core->estatuses->est_nombre }}</p>

    <p>{{ $core->cor_alta }}</p>

    <p>{{ $core->cor_baja }}</p>

@stop