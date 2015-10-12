@if (count($errors) > 0)
    @include ('adoadomin::atoms.alerts.default', [
        'type' => 'danger',
        'icon' => 'fa-exclamation-circle',
        'title' => trans('adoadomin::messages.validation_error_title'),
        'text' => implode(' ', $errors->all())
    ])
@endif