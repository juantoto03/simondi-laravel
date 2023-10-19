@extends('Dashboard.layout')

@section('content')
    
    <h1 class="ml-0 mt-8 text-left">Insertar Marca</h1>

    @include('Categorias.Marcas.Fragment._errors-from')

    <!-- Button modal -->
    <div class='div-aling-end'>
        <button id="open-modal" class="btn btn-upload">
            <i class="m-1 fas fa-file-arrow-up"></i>
        </button>
    </div>

    <!-- Modal -->
    <div id="modal" class="fixed z-10 inset-0 overflow-y-auto hidden">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">

            <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>

            <!-- This element is to trick the browser into centering the modal contents. -->
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

            <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                <!-- Agrega aquí el contenido de tu modal -->
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4 ">
                    <!-- Título del modal -->
                    <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-headline ">
                        Importar marcas
                    </h3>
                    <div class="border-t border-gray-300 my-4"></div>
                        <!-- Contenido del modal -->
                    <div class="mt-2">
                        <form method="POST" action="{{ route('marcas-importar-csv') }}" enctype="multipart/form-data">
                            @csrf
    
                            <div class="form-group">
                                <label for="archivo_csv">Archivo CSV:</label>
                                <input type="file" name="archivo_csv" accept=".csv">
                            </div>

                            <div class="border-t border-gray-300 my-4"></div>

                            <div class="mt-4 sm:px-6 sm:flex sm:flex-row-reverse">
                                <div class="mx-2">
                                    <button id="close-modal" class="btn btn-danger">Cerrar</button>
                                </div>
                                <div class="mx-2">
                                    <button type="submit" class="btn btn-primary">Importar CSV</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
        
    <form class="fomr-control" action="{{ route('marcas.store')}}" method="POST">
        
        @include('Categorias.Marcas.post._form')
            
    </form>

@stop