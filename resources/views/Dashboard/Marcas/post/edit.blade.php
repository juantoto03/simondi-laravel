@extends('Dashboard.layout')

@section('content')
    
    <h1>Marca: {{ $marca->mar_nombre }}</h1>

    @include('Dashboard.Tipos.Fragment._errors-from')
        
    <form class="form-control" action="{{ route('tipos.update', $marca->id)}}" method="post">
        @method('PUT')
        
        @include('Dashboard.Marcas.post._form')
        
    </form>

@stop