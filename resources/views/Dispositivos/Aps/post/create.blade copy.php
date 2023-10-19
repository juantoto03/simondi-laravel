@extends('Dashboard.layout')

@section('content')
    
    <h1 class="ml-0 my-8 text-left">Crear AP</h1>

    @include('Dispositivos.Aps.Fragment._errors-from')

    <button @click="showModal = true" class="btn btn-upload inline-block pb-2 pt-2.5 uppercase leading-normal shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]"
        data-te-toggle="modal"
        data-te-target="#exampleModalCenter"
        data-te-ripple-init
        data-te-ripple-color="light">
        <i class="m-1 fas fa-file-arrow-up"></i>
    </button>

    <div x-data="{ showModal: false }">
        <div x-show="showModal" class="fixed left-0 top-0 z-50 w-full h-full bg-black opacity-50"></div>
    </div>

    <!-- Modal -->
    <div x-data="{ showModal: false }" x-show="showModal" data-te-modal-init class="fixed left-0 top-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none" id="exampleModalCenter" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-modal="true" role="dialog">
        <div data-te-modal-dialog-ref
            class="pointer-events-none relative flex min-h-[calc(100%-1rem)] w-auto translate-y-[-50px] items-center opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:min-h-[calc(100%-3.5rem)] min-[576px]:max-w-[500px]">
            <div class="pointer-events-auto relative flex w-full flex-col rounded-md border-none bg-white bg-clip-padding text-current shadow-lg outline-none dark:bg-neutral-600">
                <div class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                    <!-- Modal title -->
                    <h5 class="text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-200" id="exampleModalCenterTitle"> Importar Aps </h5>
                    <!-- Close button -->
                    <button type="button" class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none" data-te-modal-dismiss aria-label="Close">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <!-- Modal body -->
                <div class="mt-2">
                    <form method="POST" action="{{ route('aps-importar-csv') }}" enctype="multipart/form-data">
                        <div class="relative p-4">
                            @csrf
    
                            <div class="form-group">
                                <label for="archivo_csv">Archivo CSV:</label>
                                <input type="file" name="archivo_csv" accept=".csv">
                            </div>
                        </div>

                        <!-- Modal footer -->
                        <div @click="showModal = false" class="flex flex-shrink-0 flex-wrap items-center justify-end rounded-b-md border-t-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                            <button type="button" class="btn-danger inline-block rounded px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out" data-te-modal-dismiss data-te-ripple-init data-te-ripple-color="light">
                                Cerrar
                            </button>
                            <button type="submit" class="btn-primary ml-1 inline-block rounded px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out" data-te-ripple-init data-te-ripple-color="light">
                                Guardar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <form clas action="{{ route('aps.store')}}" method="POST">
        @include('Dispositivos.Aps.post._form')
    </form>

@stop
