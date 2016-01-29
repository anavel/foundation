@extends('anavel::layouts.master')

@section('body')
<body class="hold-transition login-page">
    @section('alerts')
        @include('anavel::atoms.alerts.flash')

        @include('anavel::atoms.alerts.errors')
    @show

    <div class="login-box">
        <div class="login-logo">{!! config('anavel.site_name') !!}</div>

        <div class="login-box-body">
            <p class="login-box-msg">{{ trans('anavel::messages.login_message') }}</p>

            <form action="{{ route('anavel.login.post') }}" method="post">
                {!! csrf_field() !!}

                <div class="form-group has-feedback">
                    <input type="email" name="email" class="form-control" placeholder="{{ trans('anavel::messages.login_email_input') }}" value="{{ old('email') }}">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>

                <div class="form-group has-feedback">
                    <input type="password" name="password" class="form-control" placeholder="{{ trans('anavel::messages.login_password_input') }}">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>

                <div class="row">
                    <div class="col-xs-8">
                        <div class="checkbox icheck">
                            <label>
                                <input type="checkbox" name="remember" value="1"> {{ trans('anavel::messages.login_remember_input') }}
                            </label>
                        </div>
                    </div>

                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">{{ trans('anavel::messages.login_submit_button') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- jQuery 2.1.4 -->
    <script src="{{ asset('vendor/anavel/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="{{ asset('vendor/anavel/bootstrap/js/bootstrap.min.js') }}"></script>
    <!-- iCheck -->
    <script src="{{ asset('vendor/anavel/plugins/iCheck/icheck.min.js') }}"></script>
    {{--<script>
        $(function () {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' // optional
            });
        });
    </script>--}}
</body>
@stop