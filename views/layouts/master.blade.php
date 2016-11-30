<!DOCTYPE html>
<html>
    <head>
        @section('head')
        <meta charset="UTF-8">
        <title>Anavel</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- Bootstrap 3.3.2 -->
        <link href="{{ asset('vendor/anavel/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- Font Awesome Icons -->
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="{{ asset('vendor/anavel/dist/css/AdminLTE.min.css') }}" rel="stylesheet" type="text/css" />

        <link href="{{ asset('vendor/anavel/dist/css/custom.css') }}" rel="stylesheet" type="text/css" />

        <link href="{{ asset('vendor/anavel/dist/css/skins/'.config('anavel.skin').'.min.css') }}" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

        <script type="text/javascript">
            var ckEditorCustomConfig = '{!! $ckEditorData !!}';
        </script>
        @show
    </head>

    @section('body')
    <body class="{{ config('anavel.layout_options') }} {{ config('anavel.skin') }} @section('body-classes')@show">
        <div class="wrapper">
            @section('header')
                @include('anavel::molecules.header.default')
            @show

            @section('sidebar')
                @include('anavel::molecules.sidebar.default')
            @show

            <div class="content-wrapper">
                <section class="content-header">
                    @yield('content-header')

                    @yield('breadcrumb')
                </section>

                <section class="content">
                    @section('alerts')
                        @include('anavel::atoms.alerts.flash')

                        @include('anavel::atoms.alerts.errors')
                    @show

                    @yield('content')
                </section>
            </div>

            @section('footer')
                @include('anavel::molecules.footer.default')
            @show
        </div>

        <!-- REQUIRED JS SCRIPTS -->
        @section('footer-scripts')
            <!-- jQuery 2.1.3 -->
            <script src="{{ asset('vendor/anavel/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
            <!-- Bootstrap 3.3.2 JS -->
            <script src="{{ asset('vendor/anavel/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
            <!-- AdminLTE App -->
            <script src="{{ asset('vendor/anavel/dist/js/app.min.js') }}" type="text/javascript"></script>

            <!-- Optionally, you can add Slimscroll and FastClick plugins.
                Both of these plugins are recommended to enhance the
                user experience -->
        @show
    </body>
    @show
</html>