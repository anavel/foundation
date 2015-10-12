@if (count($errors) > 0)
    @foreach ($errors->all() as $error)
        @include ('adoadomin::atoms.alerts.default', [
            'type' => 'danger',
            'icon' => 'fa-exclamation-circle',
            'title' => trans('adoadomin::messages.validation_error_title'),
            'text' => $error
        ])
    @endforeach
@endif