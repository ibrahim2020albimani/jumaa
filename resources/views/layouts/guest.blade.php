<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>


        <link href="{{asset('css/app.css')}}" rel="stylesheet">
        <link href="{{asset('css/bootstrap.rtl.min.css')}}" rel="stylesheet">
        <link href="{{asset('css/main.css')}}" rel="stylesheet">
        <link href="{{asset('css/style.css')}}" rel="stylesheet">

    </head>
    <body style="background-image:url('{{asset('img/side.jpeg') }}')">

        <center class="top-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <a href="{{route('welcome_page')}}">
                        <img src="{{asset('img/logo.png')}}" alt="" width="120">
                    </a>
                    <h2 class="head-title">خطبة الجمعة</h2>
                    @guest
                    <a href="{{route('login')}}">{{__('login')}}</a>
                    @endguest
                </div>
            </div>
            @auth()
            <a href="{{route('dashboard')}}">{{__('Dashboard')}}</a>
            @endauth
        </div>
        </center>
       
        <div class="m-5" >
            @if (session()->has('message'))
            <div class="alert alert-{{session('status')}}">
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

        {{ $slot }}

        <footer style="padding-top: 5%; padding-bottom: 1%">
            <center>
                <img src="{{asset('img/logo.png')}}" alt="" width="80">
            </center>
        </footer>
    </body>
</html>
