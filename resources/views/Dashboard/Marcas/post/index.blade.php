@extends('Dashboard.layout')

@section('content')
    <a class="my-3 btn btn-success" href="{{ route('marcas.create') }}">Crear</a>

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
            @foreach ($marca as $m)
            
            <tr>
                <td>
                    {{ $m->mar_nombre }}
                </td>
                <td>
                    <a class="my-1 btn btn-primary" href="{{ route('marcas.edit', $m->id) }}">Editar</a>
                    <a class="my-1 btn btn-primary" href="{{ route('marcas.show', $m->id) }}">Ver</a>

                    <form action="{{  route("marcas.destroy", $m->id)}}" method="POST">
                        @method("DELETE")
                        @csrf
                        <button class="my-1 btn btn-danger" type="submit">Eliminar</button>
                    </form>

                </td>
            </tr>

            @endforeach
        </tbody>
    </table>

    {{ $marca->links() }}

@stop