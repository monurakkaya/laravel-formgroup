<input
        type="file"
        name="{{ $name }}{{ ($multiple ?? false) ? '[]' : '' }}"
        class="form-control"
        @if (($required ?? false))
            required
        @endif
        @if (($max ?? false))
            maxlength="{{ $max }}"
        @endif
        @if ($multiple ?? false)
            multiple
        @endif
        value="{{ old($name, request($name)) }}"
>
