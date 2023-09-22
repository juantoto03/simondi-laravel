@extends('Dashboard.layout')

@section('content')
    
    <h1>Insertar Estatus</h1>

    @include('Dashboard.Estatuses.Fragment._errors-from')
        
    <form class="form-control" action="{{ route('estatuses.store')}}" method="post">

        @include('Dashboard.Estatuses.post._form')
            
    </form>

@stop