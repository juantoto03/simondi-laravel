@extends('Dashboard.layout')

@section('content')
    
    <h1 class="m-8"> APs: {{ $ap->ap_nombre }}</h1>

    @include('Dispositivos.Aps.Fragment._errors-from')
        
    <form action="{{ route('aps.update', $ap->id) }}" method="post">
            @method('PUT')

            @include('Dispositivos.Aps.post._form')
            
        </form>

@stop