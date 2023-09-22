@extends('Dashboard.layout')

@section('content')
    <a class="my-1 btn btn-success" href="{{ route('modelos.create') }}">Crear</a>

    <table class="table mb-3">
        <thead>
            <tr>
                <th>
                    Nombre
                </th>
                <th>
                    Tipo
                </th>
                <th>
                    Marca
                </th>
                <th>
                    Acciones
                </th>
            </tr>
        </thead>

        <tbody>
            @foreach ($modelo as $m)
            
            <tr>
                <td>
                    {{ $m->mod_nombre }}
                </td><td>
                    {{ $m->tipos->tip_nombre }}
                </td><td>
                    {{ $m->marcas->mar_nombre }}
                </td>
                <td>
                    <a class="my-1 btn btn-primary" href="{{ route('modelos.edit', $m->id) }}">Editar</a>
                    <a class="my-1 btn btn-primary" href="{{ route('modelos.show', $m->id) }}">Ver</a>

                    <form action="{{  route("tipos.destroy", $m->id)}}" method="POST">
                        @method("DELETE")
                        @csrf
                        <button class="my-1 btn btn-danger" type="submit">Eliminar</button>
                    </form>

                </td>
            </tr>

            @endforeach
        </tbody>
    </table>

    {{ $modelo->links() }}

@stop