@extends('Dashboard.layout')

@section('content')
    <h3 class="my-8 text-[1.75rem] font-medium leading-[1.2]"> PUNTOS DE ACCESO </h3>

    <div class="bg-gray-100 p-4 rounded shadow-md">
        <div class="mb-4 flex items-center justify-between">
            <div class="flex-1 mr-10">
                <div class="flex flex-wrap items-stretch">
                    <input
                        id="datatable-search-input"
                        type="search"
                        class="relative m-0 -mr-0.5 block min-w-0 rounded bg-white border border-solid border-neutral-300 bg-transparent bg-clip-padding px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-neutral-700 outline-none transition duration-200 ease-in-out focus:z-[3] focus:border-primary focus:text-neutral-700 focus:shadow-[inset_0_0_0_1px_rgb(59,113,202)] focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:focus:border-primary"
                        placeholder="Buscar"
                        aria-label="Search"
                        aria-describedby="button-addon1"
                        />
                </div>
            </div>

            <a class="h-8 w-8 my-3 btn btn-success flex items-center justify-center" href="{{ route('aps.create') }}">
                <i class="fa-solid fa-plus flex items-center justify-center h-full"></i>
            </a>
        </div>
        
        <div id="datatable" >
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

                <tbody class="border border-slate-300">
                    @foreach ($ap as $a)
                    
                    <tr>
                        <td>
                            {{ $a->ap_nombre }}
                        </td>
                        <td>
                            {{ $a->ap_serial }}
                        </td>
                        <td>
                            {{ $a->ap_macadd }}
                        </td>
                        <td>
                            {{ $a->ap_ip }}
                        </td>
                        <td>
                            {{ $a->ap_firmware }}
                        </td>
                        <td>
                            {{ $a->estatuses->est_nombre }}
                        </td>
                        <td>
                            {{ $a->modelos->mod_nombre}}
                        </td>
                        
                        <td>
                            {{ $a->ap_alta }}
                        </td>
                        <td>
                            {{ $a->ap_baja }}
                        </td>
                        <td class="text-center w-36 align-middle justify-center">
                            <a class=" btn btn-primary mt-4" href="{{ route('aps.edit', $a->id) }}"> <i class="fa-solid fa-pencil"></i> </a>
                            <a class=" btn btn-secundary mt-4" href="{{ route('aps.show', $a->id) }}"> <i class="fa-solid fa-eye"></i> </a>
                            
                            <form class="btn-form" action="{{  route("aps.destroy", $a->id)}}" method="post">
                                @method("DELETE")
                                @csrf
                                <button class="btn btn-danger mt-4"  type="submit"> <i class="fa-solid fa-trash"></i> </button>
                            </form>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{ $ap->links() }}
    </div>
    
@stop


