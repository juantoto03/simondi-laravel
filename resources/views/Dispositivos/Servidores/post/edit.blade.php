@extends('Dashboard.layout')

@section('content')
    
    <h1 class="m-8"> Servidor: {{ $servidore->ser_nombre }}</h1>

    @include('Dispositivos.Aps.Fragment._errors-from')
        
    <form action="{{ route('servidores.update', $servidore->id) }}" method="post">
            @method('PUT')

            @include('Dispositivos.Servidores.post._form')
            
        </form>

@stop