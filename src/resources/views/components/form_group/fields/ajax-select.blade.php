<select
        name="{{ $name }}"
        class="form-control"
        @if (($required ?? false))
        required
        @endif
>
    @if (old($name, false) === false)
        <option selected disabled hidden>Secin</option>
    @endif
    @foreach ($options['models'] as $option)

        <option @if(old($name, '') === $option->{(($options['value'] ?? 'id'))}) selected @endif value="{{ $option->{($options['value'] ?? 'id')} }}">{{ $option->{($options['label'] ?? 'name')} }}</option>
    @endforeach

</select>

@push('js')
    <script>
        $(function () {

            var $select = $('select[name={{$name}}]').select2({
                tags : true,
                createTag: function (params) {
                    var term = $.trim(params.term);

                    if (term === '') {
                        return null;
                    }

                    return {
                        id : term,
                        text: term,
                        {{ $options['label'] ?? 'name' }} : term,
                        @isset ($options['params'])
                            @foreach ($options['params'] as $param)
                                {{ $param }} : $('select[name={{ $param }}]').val(),
                            @endforeach
                        @endisset
                        @isset ($options['parent'])
                            {{ $options['parent'] }} : $('select[name={{ $options['parent'] }}]').val(),
                        @endisset
                        newTag: true
                    }
                }
            });

            $select.on('select2:selecting', function (e) {
                var selection = e.params.args.data;
                if (selection.newTag) {
                    e.preventDefault();

                    $.post('{{ route($options['route']) }}',
                        selection,
                        function (response) {
                            response = response.data;
                            var option = new Option(response.{{$options['label'] ?? 'name'}}, response.{{$options['value'] ?? 'id'}}, true, true);
                            $select.append(option).trigger('change');
                            $select.select2('close');
                    });
                }
            });

            @isset ($options['child'])
                var child_holder = $('select[name={{$options['child']['name']}}]').closest('.form-group');
                child_holder.hide();

                $select
                    .on('change', function () {
                        var val = $(this).val();
                        $.get(
                            '{{ route($options['child']['route']) }}?{{$name}}=' + val,
                            function (response) {
                                $('select[name={{$options['child']['name']}}]').refreshDataSelect2(response.data, '{{ ($options['child']['label'] ?? 'name') }}');
                                @if (old($options['child']['name'], false) !== false)
                                    $('select[name={{$options['child']['name']}}]').val({{ old($options['child']['name']) }});
                                @endif
                                child_holder.show();
                            }
                        )
                    });

                @if (old($name, false) !== false)
                    $select.trigger('change');
                @endif
            @endisset
        });
    </script>
@endpush