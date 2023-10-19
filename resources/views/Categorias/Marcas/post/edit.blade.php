@extends('Dashboard.layout')

@section('content')
    
    <h1 class="ml-0 m-8 text-left">Marca: {{ $marca->mar_nombre }}</h1>

    @include('Categorias.Tipos.Fragment._errors-from')
        
    <form class="form-control" action="{{ route('tipos.update', $marca->id)}}" method="post">
        @method('PUT')
        
        @include('Categorias.Marcas.post._form')
        
    </form>

@stop