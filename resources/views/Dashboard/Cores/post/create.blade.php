@extends('Dashboard.layout')

@section('content')
    
    <h1>Crear Core</h1>

        @include('Dashboard.Cores.Fragment._errors-from')
        
        <form clas action="{{ route('cores.store')}}" method="POST">
            
            @include('Dashboard.Cores.post._form')
            
        </form>

@stop