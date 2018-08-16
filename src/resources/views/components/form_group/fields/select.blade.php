<select
        name="{{ $name }}"
        class="form-control"
        @if (($required ?? false))
        required
        @endif
>
    @if (old($name, request($name, false)) === false)
        <option selected disabled hidden>Secin</option>
    @endif
    @foreach ($options['models'] as $option)
        @if (is_array($option))
            @php($option = json_decode(json_encode($option)))
        @endif
        <option @if(old($name, request($name, false)) === $option->{($options['value'] ?? 'id')}) selected @endif value="{{ $option->{($options['value'] ?? 'id')} }}">{{ $option->{($options['label'] ?? 'name')} }}</option>
    @endforeach

</select>

@push('js')
    <script>
        $(function () {
           var $select = $('select[name={{$name}}]').select2();

            @if (old($name, request($name, false)) !== false)
            $select.trigger('change');
            @endif
        });
    </script>
@endpush