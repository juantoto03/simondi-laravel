<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        
        <!-- Icon -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.css" rel="stylesheet" />


        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="dark:bg-zinc-800 [&>*]:leading-[1.6]">

        <!-- Sidenav -->
            @include('layouts.siderbar')
        <!-- Sidenav -->

        <!-- Content -->
        <div class="min-h-screen w-full bg-gray-50 !pl-0 text-center sm:!pl-60 mt-[-25px] " id="content mx-y">
            
            @include('layouts.navar')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">

                    </div>
                </header>
            @endif

            @if (session('status'))
                {{ session('status') }}
            @endif
            <div class="mx-8 mb-5">
                @yield('content')
            <div>
        </div>
        <button id="toggler" class="m-12 inline-block rounded bg-zinc-800 px-6 py-2.5 text-xs font-medium uppercase leading-tight text-white shadow-md transition duration-150 ease-in-out hover:bg-black hover:shadow-lg focus:bg-black focus:shadow-lg focus:outline-none focus:ring-0 active:bg-zinc-900 active:shadow-lg sm:hidden"
            data-te-sidenav-toggle-ref
            data-te-target="#full-screen-example"
            data-te-ripple-init
            data-te-ripple-color="white">
            <span class="block [&>svg]:h-5 [&>svg]:w-5 [&>svg]:text-white">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-5 w-5">
                    <path fill-rule="evenodd"
                        d="M3 6.75A.75.75 0 013.75 6h16.5a.75.75 0 010 1.5H3.75A.75.75 0 013 6.75zM3 12a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3.75A.75.75 0 013 12zm0 5.25a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3.75a.75.75 0 01-.75-.75z"
                    clip-rule="evenodd" />
                </svg>
            </span>
        </button>
        <!-- Content -->
    </body>
</html>