<div class="alert alert-{{ $type }} alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    @if ($title || $icon)
    <h4>
        @if ($icon)
        <i class="icon fa {{ $icon }}"></i>
        @endif
        {{ $title }}
    </h4>
    @endif

    {!! $text !!}
</div>