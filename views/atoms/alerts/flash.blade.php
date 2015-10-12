@if (Session::has('adoadomin-alert'))
    @include ('adoadomin::atoms.alerts.default', Session::get('adoadomin-alert'))

    {{ Session::forget('adoadomin-alert') }}
@endif