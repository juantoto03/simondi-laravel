@extends('Dashboard.layout')

@section('content')
    
    <h1>Insertar Tipos de Dsipositivo</h1>

    @include('Dashboard.Tipos.Fragment._errors-from')
        
    <form class="form-control" action="{{ route('tipos.store')}}" method="POST">
        
        @include('Dashboard.Tipos.post._form')
            
    </form>

@stop