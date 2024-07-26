<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }} - @yield('title')</title>
        <meta name="keywords" content="@yield('meta_keywords','E-commerce')">
        <meta name="description" content="@yield('meta_description','')">
        @vite(['resources/css/app.css','resources/js/app.js'])

    </head>
    <body>
            <!-- Page Content -->
        @yield('content')
        <script>
            if('{{Session::has('alert')}}'){
              alert('{{Session::get('alert')}}');
            }
        </script>
    </body>
</html>
