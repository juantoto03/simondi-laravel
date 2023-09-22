@extends('Dashboard.layout')

@section('content')
    
    <h1>Insertar Modelo de Dsipositivo</h1>

        @include('Dashboard.Modelos.Fragment._errors-from')
        
        <form class="form-control" action="{{ route('modelos.store')}}" method="POST">

            @include('Dashboard.Modelos.post._form')
            
        </form>

@stop