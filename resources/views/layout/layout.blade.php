<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>{{ config('app.title') }}</title>
    <link rel="shortcut icon" type="image/png" href="/img/github_16x16.png"/>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} {{ app()->version() }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>


<div class="container" id="app">
    @include('layout.parts.navbar')

    @yield('content')

    <footer class="footer">
        <p>&copy; Digital4u {{ date('Y') }}</p>
    </footer>

</div>

<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
