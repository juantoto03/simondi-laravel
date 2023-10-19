@extends('Dashboard.layout')

@section('content')

    <h1 class="ml-0 m-8 text-left">Editar Modelo: {{ $modelo->mod_nombre }}</h1>

    @include('Categorias.Modelos.Fragment._errors-from')

    <form class="form-control" action="{{ route('modelos.update', $modelo->id) }}" method="post">
        @method('PUT')
        
        @include('Categorias.Modelos.post._form')

    </form>

@stop