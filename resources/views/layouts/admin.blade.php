<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Starter</title>

    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{mix('css/app.css')}}">
    @livewireStyles
</head>

<body class="hold-transition sidebar-mini">
<div class="wrapper">

    <x-navabar-Admin />

    <x-asidebar-Admin />

    <div class="content-wrapper">

        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Starter Page</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Starter Page</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>


        <div class="content">
            @yield('content')
        </div>

    </div>


    <x-profil-Admin/>


    <x-footer-Admin/>
</div>


@livewireScripts
<script src="{{mix('js/app.js')}}"></script>
</body>

</html>
