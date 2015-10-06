<!DOCTYPE html>
<html>
    <head>
        @section('head')
        <meta charset="UTF-8">
        <title>Adoadomin</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- Bootstrap 3.3.2 -->
        <link href="{{ asset('vendor/adoadomin/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- Font Awesome Icons -->
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="{{ asset('vendor/adoadomin/dist/css/AdminLTE.min.css') }}" rel="stylesheet" type="text/css" />

        <link href="{{ asset('vendor/adoadomin/dist/css/skins/'.config('adoadomin.skin').'.min.css') }}" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
        @show
    </head>

    <body class="{{ config('adoadomin.layout_options') }} {{ config('adoadomin.skin') }}">
        <div class="wrapper">

            @section('header')
                @include('adoadomin::molecules.header.default')
            @show

            @section('sidebar')
                @include('adoadomin::molecules.sidebar.default')
            @show

            <div class="content-wrapper">
                <section class="content-header">
                    @yield('content-header')

                    @yield('breadcrumb')
                </section>

                <section class="content">

                    @yield('content')

                </section>
            </div>

            @section('footer')
                @include('adoadomin::molecules.footer.default')
            @show

        </div>

        <!-- REQUIRED JS SCRIPTS -->
        @section('footer-scripts')
            <!-- jQuery 2.1.3 -->
            <script src="{{ asset('vendor/adoadomin/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
            <!-- Bootstrap 3.3.2 JS -->
            <script src="{{ asset('vendor/adoadomin/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
            <!-- AdminLTE App -->
            <script src="{{ asset('vendor/adoadomin/dist/js/app.min.js') }}" type="text/javascript"></script>

            <!-- Optionally, you can add Slimscroll and FastClick plugins.
                Both of these plugins are recommended to enhance the
                user experience -->
        @show
    </body>
</html>