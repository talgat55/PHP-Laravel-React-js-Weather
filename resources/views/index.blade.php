<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script type="text/javascript">
        window.token = '{{ csrf_token() }}';
    </script>
    <title>{{ config('app.name') }}</title>
    <!-- Favicon -->
    <link href="{{ asset('favicon.ico') }}" rel="icon" type="image/png">
    <link href="{{ mix('/css/server.css') }}" rel="stylesheet">
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet">

</head>
<body class="{{ $class ?? '' }}">
<h1 class="hide-title">{{ config('app.name') }}</h1>
<div id="root"></div>
<script src="{{ mix('/js/app.js') }}"></script>
</body>
</html>