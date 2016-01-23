@if (count($errors) > 0)
    @include ('anavel::atoms.alerts.default', [
        'type' => 'danger',
        'icon' => 'fa-exclamation-circle',
        'title' => trans('anavel::messages.validation_error_title'),
        'text' => implode(' ', $errors->all())
    ])
@endif