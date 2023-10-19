@extends('Dashboard.layout')

@section('content')
    
    <h1 class="ml-0 m-8 text-left">Estatus: {{ $estatus->est_nombre }}</h1>

    @include('Categorias.Estatuses.Fragment._errors-from')
        
    <form class="form-control" action="{{ route('estatuses.update', $estatus->id)}}" method="post">
        @method('PUT')

        @include('Categorias.Estatuses.post._form')
        
    </form>

@stop