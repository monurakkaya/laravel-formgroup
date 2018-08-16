<label class="checkbox-inline">
    <input type="checkbox" name="{{ $name }}" class="styled" {{ ($checked ?? false) ? 'checked' : '' }}>
    {{ $slot }}
</label>

@push('js')
    <script>
        $(function () {
            $('input[name={{$name}}]').uniform({
                radio : 'choise'
            })
        })
    </script>
@endpush