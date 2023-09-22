@extends('Dashboard.layout')

@section('content')

    <a class="my-3 btn btn-success" href="{{ route('cores.create') }}">Crear</a>
    
    <table class="table mb-3">
        <tr>
            <thead>
                <th>
                    Nombre
                </th>
                <th>
                    Numero de Serie    
                </th>
                <th>
                    Memoria
                </th>
                <th>
                    CPU
                </th>
                <th>
                    Puertos
                </th>
                <th>
                    Mac Address
                </th>
                <th>
                    IP
                </th>
                <th>
                    Firmware
                </th>
                <th>
                    Estatus
                </th>
                <th>
                    Modelo
                </th>
                <th>
                    Fecha de Alta
                </th>
                <th>
                    Fecha de Baja
                </th>
                <th>
                    Acciones
                </th>
            </thead>
        </tr>

        <tbody>
            @foreach ($core as $c)
            
            <tr>
                <td>
                    {{ $c->cor_nombre }}
                </td>
                <td>
                    {{ $c->cor_serial }}
                </td>
                <td>
                    {{ $c->cor_memoria }}
                </td>
                <td>
                    {{ $c->cor_cpu }}
                </td>
                <td>
                    {{ $c->cor_puertos }}
                </td>
                <td>
                    {{ $c->cor_macadd }}
                </td>
                <td>
                    {{ $c->cor_ip }}
                </td>
                <td>
                    {{ $c->cor_firmware }}
                </td>
                <td>
                    {{ $c->estatuses->est_nombre }}
                </td>
                <td>
                    {{ $c->modelos->mod_nombre}}
                </td>
                
                <td>
                    {{ $c->cor_alta }}
                </td>
                <td>
                    {{ $c->cor_baja }}
                </td>
                <td>
                    <a class="my-1 btn btn-primary" href="{{ route('cores.edit', $c->id) }}">Editar</a>
                    <a class="my-1 btn btn-primary" href="{{ route('cores.show', $c->id) }}">Ver</a>
                    
                    <form action="{{  route("cores.destroy", $c->id)}}" method="post">
                        @method("DELETE")
                        @csrf
                        <button class="my-1 btn btn-danger"  type="submit">Eliminar</button>
                    </form>

                </td>
            </tr>

            @endforeach
        </tbody>
    </table>

    {{ $core->links() }}

@stop


