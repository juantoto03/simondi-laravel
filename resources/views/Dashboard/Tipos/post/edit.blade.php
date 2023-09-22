@extends('Dashboard.layout')

@section('content')
    
    <h1>Tipo: {{ $tipo->tip_nombre }}</h1>

    @include('Dashboard.Tipos.Fragment._errors-from')
        
    <form class="form-control" action="{{ route('tipos.update', $tipo->id)}}" method="post">
        @method('PUT')
        
        @include('Dashboard.Tipos.post._form')

    </form>

@stop