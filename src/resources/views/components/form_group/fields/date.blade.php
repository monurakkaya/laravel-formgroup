<input
        type="text"
        name="{{ $name }}"
        class="form-control"
        @if (($required ?? false))
        required
        @endif
        value="{{ old($name) }}"
>


@push('js')
    <script>
        $(function () {
            $('input[name={{ $name }}]').daterangepicker({
                'singleDatePicker' : true,
                'showDropdowns' : true,
                'locale' : {
                    format : 'YYYY-MM-DD'
                }
            })
        });
    </script>
@endpush