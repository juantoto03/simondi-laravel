@extends('Dashboard.layout')

@section('content')
    
    <h1 class="m-8">Switch: {{ $switch->swi_nombre }}</h1>

    @include('Dispositivos.Switches.Fragment._errors-from')
        
    <form action="{{ route('switches.update', $switch->id) }}" method="post">
            @method('PUT')

            @include('Dispositivos.Switches.post._form')
            
        </form>

@stop