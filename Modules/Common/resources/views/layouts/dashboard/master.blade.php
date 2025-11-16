<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Mega Building Assessment - {{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-icons.min.css') }}">
    <style>
        body {
            background-color: rgb(230, 230, 230);
        }

        .classification-sustainable {
            color: #1976d2 !important;
        }

        .classification-intelligent {
            color: #ff9800 !important;
        }

        .classification-healthy {
            color: #4caf50 !important;
        }

        .percentage-badge {
            font-weight: 600;
            font-size: 0.75rem;
            padding: 0.2rem 0.5rem;
            border-radius: 0.375rem;
            display: inline-block;
            margin: 0.1rem;
        }

        .context-item-hover {
            transition: background 0.2s;
            border-radius: 0.4rem;
            display: inline-block;
        }

        .context-item-hover:hover {
            background-color: rgba(108, 117, 125, 0.1) !important;
            text-decoration: none;
        }
    </style>
    @yield('css')
</head>
<body>

    @yield('content')


    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    @yield('js')
</body>
