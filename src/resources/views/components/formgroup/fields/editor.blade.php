<textarea
    type="text"
    id="ck-{{ str_slug($name) }}"
    name="{{ $name }}"
    class="form-control"
    @if (($required ?? false))
    required
    @endif
    @if (($max ?? false))
    maxlength="{{ $max }}"
    @endif
>{{ old($name, request($name)) }}</textarea>

<script src="/ckeditor/ckeditor.js"></script>
<script>
    $(function () {
        CKEDITOR.replace('ck-{{str_slug($name)}}', {
            'language' : 'tr'
        })
    });
</script>
