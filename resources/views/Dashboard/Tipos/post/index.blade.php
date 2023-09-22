@extends('Dashboard.layout')

@section('content')
    <a class="my-3 btn btn-success" href="{{ route('tipos.create') }}">Crear</a>

    <table class="table mb-3">
        <tr>
            <thead>
                <th>
                    Nombre
                </th>
                <th>
                    Acciones
                </th>
            </thead>
        </tr>

        <tbody>
            @foreach ($tipos as $t)
            
            <tr>
                <td>
                    {{ $t->tip_nombre }}
                </td>
                <td>
                    <a class="my-1 btn btn-primary" href="{{ route('tipos.edit', $t->id) }}">Editar</a>
                    <a class="my-1 btn btn-primary" href="{{ route('tipos.show', $t->id) }}">Ver</a>

                    <form action="{{  route("tipos.destroy", $t->id)}}" method="POST">
                        @method("DELETE")
                        @csrf
                        <button class="my-1 btn btn-danger" type="submit">Eliminar</button>
                    </form>

                </td>
            </tr>

            @endforeach
        </tbody>
    </table>

    {{ $tipos->links() }}

@stop