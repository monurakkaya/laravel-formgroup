<input type="text" class="form-control" data-rel="{{ $name }}">
<div class="input-group hidden" id="{{ $name }}">
    <input type="hidden" class="start_date" name="{{ $name.'_start' }}" value="{{ old($name.'_start') }}">
    <input type="hidden" class="end_date" name="{{ $name.'_end' }}" value="{{ old($name.'_end') }}">
</div>



@push('js')
    <script>
        $(function () {
            var holder = $('#{{ $name }}');
            $('[data-rel={{$name}}]').daterangepicker({
                opens: 'right',
                applyClass: 'bg-slate-600',
                cancelClass: 'btn-default',
                startDate : moment('{{ old($name.'_start', \Illuminate\Support\Carbon::now()->format('Y-m-d')) }}'),
                endDate : moment('{{ old($name.'_end', \Illuminate\Support\Carbon::now()->addDay(7)->format('Y-m-d')) }}'),
                ranges: {
                    'Bugun': [moment(), moment()],
                    'Dun': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Onumuzdeki 7 Gun': [moment(), moment().add(6, 'days'), ],
                    'Onumuzdeki 30 Gun': [moment(), moment().add(29, 'days'), ],
                    'Bu Ay': [moment().startOf('month'), moment().endOf('month')],
                    'Gelecek Ay': [moment().add(1, 'month').startOf('month'), moment().add(1, 'month').endOf('month')]
                },
                locale: {
                    format: 'DD/MM/YYYY',
                    firstDay: 0
                }
            }, function (startDate, endDate) {
                holder.find('.start_date').val(startDate.format('YYYY-MM-DD'));
                holder.find('.end_date').val(endDate.format('YYYY-MM-DD'));
            });

            <!-- get requestler için -->
            @if (request()->filled($name.'_start'))
            $('[data-rel={{ $name }}]').data('daterangepicker').setStartDate(moment('{{ request($name.'_start') }}'));
            $('[data-rel={{ $name }}]').data('daterangepicker').setEndDate(moment('{{ request($name.'_end') }}'));
            holder.find('.start_date').val('{{ request($name.'_start') }}');
            holder.find('.end_date').val('{{ request($name.'_end') }}');
            @endif
        })
    </script>
@endpush