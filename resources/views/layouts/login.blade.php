<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Huizen CMS</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" href="{{ asset('img/theme/favicon.png') }}">

    <!-- Fonts -->
    <link rel="stylesheet" href="{{ asset('fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('fonts/font-awesome-5/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}?v=2"/>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

</head>
<body>
    <main>
        @yield('content')
    </main>
</body>
</html>
