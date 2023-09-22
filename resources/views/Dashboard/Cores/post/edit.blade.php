@extends('Dashboard.layout')

@section('content')
    
    <h1>Core: {{ $core->cor_nombre }}</h1>

    @include('Dashboard.Cores.Fragment._errors-from')
        
    <form action="{{ route('cores.update', $core->id) }}" method="post">
            @method('PUT')

            @include('Dashboard.Cores.post._form')
            
        </form>

@stop