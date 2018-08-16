<input
        type="email"
        name="{{ $name }}"
        class="form-control"
        @if (($required ?? false))
            required
        @endif
        @if (($max ?? false))
            maxlength="{{ $max }}"
        @endif
        value="{{ old($name, request($name)) }}"
>
