<select
        id="{{ $id }}"
        name="{{ $name }}"
        class="form-control"
        multiple
        @if (($required ?? false))
        required
        @endif
>
    @foreach ($options['models'] as $option)
        @if (is_array($option))
            @php($option = json_decode(json_encode($option)))
        @endif
        <option @if(old($name, '') === $option->{($options['value'] ?? 'id')}) selected @endif value="{{ $option->{($options['value'] ?? 'id')} }}">{{ $option->{($options['label'] ?? 'name')} }}</option>
    @endforeach
    @foreach (old($id, []) as $option)
        <option selected value="{{ $option->{($options['value'] ?? 'id')} }}">{{ $option->{(($options['label'] ?? 'name'))} }}</option>
    @endforeach

</select>

@push('js')
    <script>
        $(function () {
            $('#{{$id}}').select2({
                tags : true
            });
        });
    </script>
@endpush