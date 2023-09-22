@extends('Dashboard.layout')

@section('content')
    <a class="my-3 btn btn-success" href="{{ route('estatuses.create') }}">Crear</a>

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
            @foreach ($estatuses as $e)
            
            <tr>
                <td>
                    {{ $e->est_nombre }}
                </td>
                <td>
                    <a class="my-1 btn btn-primary" href="{{ route('estatuses.edit', $e->id) }}">Editar</a>
                    <a class="my-1 btn btn-primary" href="{{ route('estatuses.show', $e->id) }}">Ver</a>

                    <form action="{{  route("estatuses.destroy", $e->id)}}" method="POST">
                        @method("DELETE")
                        @csrf
                        <button class="my-1 btn btn-danger" type="submit">Eliminar</button>
                    </form>

                </td>
            </tr>

            @endforeach
        </tbody>
    </table>

    {{ $estatuses->links() }}

@stop