<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="{{asset('frontend/bootstrap/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{mix('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/clientStyle.css')}}">
    <link rel="stylesheet" href="{{asset('css/style2.css')}}">
    <script src="frontend/script/script.js" defer></script>
    <script src="{{asset('js/alpine.min.js')}}" defer></script>
    @livewireStyles
    <title>Accueil</title>
</head>

<body class="d-flex flex-column min-vh-100">

    <x-navabar-Client />

    @yield('content')


    <x-footer-Client />
    <script src="{{mix('js/app.js')}}"></script>
    @yield('script')
    @stack('checkout')
    @livewireScripts

</body>

</html>