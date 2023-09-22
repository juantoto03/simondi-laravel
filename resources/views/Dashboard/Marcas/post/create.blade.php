@extends('Dashboard.layout')

@section('content')
    
    <h1>Insertar Marca del Dsipositivo</h1>

    @include('Dashboard.Marcas.Fragment._errors-from')
        
    <form class="fomr-control" action="{{ route('marcas.store')}}" method="POST">
        
        @include('Dashboard.Marcas.post._form')
            
    </form>

@stop