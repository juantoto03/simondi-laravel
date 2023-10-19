@extends('Dashboard.layout')

@section('content')
    
    <h1 class="m-8">Firewall: {{ $firewall->fir_nombre }}</h1>

    @include('Dispositivos.Firewalls.Fragment._errors-from')
        
    <form action="{{ route('firewalls.update', $firewall->id) }}" method="post">
            @method('PUT')

            @include('Dispositivos.Firewalls.post._form')
            
        </form>

@stop