@extends('Dashboard.layout')

@section('content')
    
    <h1 class="ml-0 mt-8 text-left">Router: {{ $core->cor_nombre }}</h1>

    @include('Dispositivos.Cores.Fragment._errors-from')
        
    <form action="{{ route('cores.update', $core->id) }}" method="post">
            @method('PUT')

            @include('Dispositivos.Cores.post._form')
            
        </form>

@stop