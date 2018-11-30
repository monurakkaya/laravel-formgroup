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
        @if (($min ?? false))
            min="{{ $min }}"
        @endif
        @if (($step ?? false))
            step="{{ $step }}"
        @endif
        value="{{ old($name, request()->get($name)) }}"
>
