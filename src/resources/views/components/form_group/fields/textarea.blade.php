<textarea
        type="text"
        name="{{ $name }}"
        class="form-control"
        @if (($required ?? false))
            required
        @endif
        @if (($max ?? false))
            maxlength="{{ $max }}"
        @endif
>{{ old($name, request($name)) }}</textarea>
