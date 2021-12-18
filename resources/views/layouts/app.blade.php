<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <link href="{{asset('css/bootstrap.rtl.min.css')}}" rel="stylesheet">
{{--         <link href="{{asset('css/bootstrap-utilities.rtl.min.css')}}" rel="stylesheet">
        <link href="{{asset('css/bootstrap-reboot.rtl.min.css')}}" rel="stylesheet">
        <link href="{{asset('css/bootstrap-grid.rtl.min.css')}}" rel="stylesheet"> --}}
        <link href="{{asset('css/main.css')}}" rel="stylesheet">
        <style>
            .alert{
                width: 30%;
                margin: 3px auto;
                height: 20px !important;
                font-size: 12px;
                padding: 0 3px;
            }
        </style>
        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
        <script src="{{ asset('js/bootstrap.bundle.min.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        <x-jet-banner />

        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-menu')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif


            <div class="mt-5">
                @if (session()->has('message'))
                <div class="alert alert-success ">
                    <center>{{ session('message') }}</center>
                </div>
                @endif

                @if ($errors->any())
                    @foreach($errors->all() as $e)
                    <div class="alert alert-danger">
                        {{ $e }}
                    </div>
                    @endforeach
                @endif
            </div>
   

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        @stack('modals')

        @livewireScripts
    </body>
</html>
