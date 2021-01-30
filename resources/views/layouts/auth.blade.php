<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Responsive Admin Dashboard Template">
        <meta name="keywords" content="admin,dashboard">
        <meta name="author" content="stacks">
        <!-- The above 6 meta tags *must* come first in the head; any other head content must come *after* these tags -->

        <!-- Title -->
        <title>{{ config('app.name', 'Amber') }}</title>

        <!-- Styles -->
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700,900&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
        <link href="{{ asset('theme/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('theme/plugins/font-awesome/css/all.min.css') }}" rel="stylesheet">


        <!-- Theme Styles -->
        <link href="{{ asset('theme/css/connect.min.css') }}" rel="stylesheet">
        <link href="{{ asset('theme/css/admin4.css') }}" rel="stylesheet">
        <link href="{{ asset('theme/css/dark_theme.css') }}" rel="stylesheet">
        <link href="{{ asset('theme/css/custom.css') }}" rel="stylesheet">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <!-- Favicon -->
        <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
        <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="auth-page sign-in">

        <div class='loader'>
            <div class='spinner-grow text-primary' role='status'>
                <span class='sr-only'>Loading...</span>
            </div>
        </div>

        @yield('content')

        <!-- Javascripts -->
        <script src="{{ asset('theme/plugins/jquery/jquery-3.4.1.min.js') }}"></script>
        <script src="{{ asset('theme/plugins/bootstrap/popper.min.js') }}"></script>
        <script src="{{ asset('theme/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('theme/plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}" defer></script>
        <script src="{{ asset('theme/js/connect.min.js') }}" defer></script>
        <script src="{{ asset('js/app.js') }}" defer></script>
    </body>
</html>
