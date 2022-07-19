<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>USAKIN</title>

    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{mix('css/app.css')}}">
    @yield('css')
    @livewireStyles
</head>

<body class="layout-fixed sidebar-mini" style="height: auto;">
<div class="wrapper">

    <x-navabar-Admin />

    <x-asidebar-Admin />

    <div class="content-wrapper" style="min-height: 550px;">

        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-1">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-bold ">@yield('title')</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('Admin.dashboard')}}">Home</a></li>
                            <li class="breadcrumb-item active">@yield('title')</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <br>


        <div class="content">
            @yield('content')
        </div>

    </div>


    <x-profil-Admin/>



</div>
<x-footer-Admin/>


@livewireScripts
<script src="{{mix('js/app.js')}}"></script>
@yield('script')
</body>

</html>
