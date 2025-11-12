<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('name') }}</title>

    @include('common::includes.css')
    @yield('css')
</head>

<body>
    @include('common::includes.navbar')

    @yield('content')


    @include('common::includes.js')
    @yield('js')
</body>

</html>
