<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>USAKIN-ADMIN | Log in</title>

        <!-- Google Font: Source Sans Pro -->
        <link
            rel="stylesheet"
            href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback"
        />
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{ asset('css/styleAuth.css') }}" />
        <link rel="stylesheet" href="{{
            mix("css/app.css")
        }}" />
    </head>

    <body
        class="hold-transition login-page"
        style="transform: translateY(-70px)"
    >
        <!-- /.login-logo -->
        @yield('form')

        <!-- /.login-box -->
        <script src="{{ mix('js/app.js') }}"></script>
        <!-- jQuery -->
    </body>
</html>
