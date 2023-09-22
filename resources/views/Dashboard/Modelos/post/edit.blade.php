@extends('Dashboard.layout')

@section('content')

    <h1>Editar Modelo: {{ $modelo->mod_nombre }}</h1>

    @include('Dashboard.Modelos.Fragment._errors-from')

    <form class="form-control" action="{{ route('modelos.update', $modelo->id) }}" method="post">
        @method('PUT')
        
        @include('Dashboard.Modelos.post._form')

    </form>

@stop