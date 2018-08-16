<div class="form-group{{ $errors->has($name) ? ' has-error' : ''}}">
    @isset($slot)
        @if ($type !== 'checkbox')
            <label><strong>{{ $slot }}</strong></label>
        @endif
        @if(request()->filled($name)
                || request()->filled($name.'_start')
                || request()->filled($name.'_min'))
            <a class="remove-{{$name}}" style="margin-left: 5px;"><i class="icon-trash"></i> </a>
        @endif
    @endisset
    @include('laravel-formgroup::components.form_group.fields.'.$type)

    @if (isset($info) && $info !== '')
        <span class="text-info">{{$info}}</span>
    @endif

    @if ($errors->has($name))
        <span class="help-block">
            {{ $errors->first($name) }}
        </span>
    @endif


</div>

@if(request()->filled($name)
    || request()->filled($name.'_start')
    || request()->filled($name.'_min'))
@push('js')
    <script>
        $(function () {
            $('.remove-{{$name}}').on('click', function () {
                $('[data-rel={{$name}}]').val('');
                $('[name={{$name}}]').val('');
                @if ($type === 'model')
                $('[data-rel={{$name}}]').trigger('change');
                @elseif ($type === 'daterange')
                $('[name={{$name}}_start]').val('');
                $('[name={{$name}}_end]').val('');
                @elseif ($type === 'pricerange')
                $('[name={{$name}}_max]').val('');
                $('[name={{$name}}_min]').val('');
                @endif
            })
        })
    </script>
@endpush
@endif
