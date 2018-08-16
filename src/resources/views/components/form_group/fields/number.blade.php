<input
        type="number"
        name="{{ $name }}"
        class="form-control"
        @if (($required ?? false))
            required
        @endif
        @if (($max ?? false))
            max="{{ $max }}"
        @endif
        value="{{ old($name, request()->get($name)) }}"
>
