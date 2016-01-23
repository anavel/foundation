@if (Session::has('anavel-alert'))
    @include ('anavel::atoms.alerts.default', Session::get('anavel-alert'))

    {{ Session::forget('anavel-alert') }}
@endif