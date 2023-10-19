@extends('Dashboard.layout')

@section('content')
    <h3 class="my-4 text-[1.75rem] font-medium leading-[1.2]"> SWITCHES </h3>
    
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
            <a class="h-8 w-8 my-3 btn btn-success flex items-center justify-center" href="{{ route('switches.create') }}">
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

                <tbody class="border border-slate-300">
                    @foreach ($switch as $s)
                    
                    <tr>
                        <td>
                            {{ $s->swi_nombre }}
                        </td>
                        <td>
                            {{ $s->swi_serial }}
                        </td>
                        <td>
                            {{ $s->swi_memoria }}
                        </td>
                        <td>
                            {{ $s->swi_cpu }}
                        </td>
                        <td>
                            {{ $s->swi_puertos }}
                        </td>
                        <td>
                            {{ $s->swi_macadd }}
                        </td>
                        <td>
                            {{ $s->swi_ip }}
                        </td>
                        <td>
                            {{ $s->swi_firmware }}
                        </td>
                        <td>
                            {{ $s->estatuses->est_nombre }}
                        </td>
                        <td>
                            {{ $s->modelos->mod_nombre}}
                        </td>
                        
                        <td>
                            {{ $s->swi_alta }}
                        </td>
                        <td>
                            {{ $s->swi_baja }}
                        </td>
                        <td class="text-center w-36 align-middle justify-center">
                            <a class="mt-4 btn btn-primary" href="{{ route('switches.edit', $s->id) }}"> <i class="fa-solid fa-pencil"></i> </a>
                            <a class="mt-4 btn btn-secundary" href="{{ route('switches.show', $s->id) }}"> <i class="fa-solid fa-eye"></i> </a>
                            
                            <form class="btn-form" action="{{  route("switches.destroy", $s->id)}}" method="post">
                                @method("DELETE")
                                @csrf
                                <button class="mt-4 btn btn-danger"  type="submit"> <i class="fa-solid fa-trash"></i> </button>
                            </form>

                        </td>
                    </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
        {{ $switch->links() }}
    </div>

@stop


