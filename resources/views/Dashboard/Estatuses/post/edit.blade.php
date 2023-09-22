@extends('Dashboard.layout')

@section('content')
    
    <h1>Tipo: {{ $estatus->est_nombre }}</h1>

    @include('Dashboard.Estatuses.Fragment._errors-from')
        
    <form class="form-control" action="{{ route('estatuses.update', $estatus->id)}}" method="post">
        @method('PUT')

        @include('Dashboard.Estatuses.post._form')
        
    </form>

@stop