<div class="input-group">
    @if (($position ?? 'left') === 'left')
        <span class="input-group-addon">{!! $options['prefix'] !!}</span>
    @endif
    @include('laravel-formgroup::fields.'.$options['addon_type'])
    @if (($position ?? 'left') === 'right')
        <span class="input-group-addon">{!! $options['prefix'] !!}</span>
    @endif
</div>
