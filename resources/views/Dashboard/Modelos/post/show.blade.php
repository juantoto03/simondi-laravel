@extends('Dashboard.layout')

@section('content')
    
    <h1>{{ $modelo->mod_nombre }}</h1>

    <p>{{ $modelo->tipos->tip_nombre }}</p>

    <p>{{ $modelo->marcas->mar_nombre }}</p>

@stop