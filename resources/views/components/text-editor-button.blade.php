<button
    type="button"
    title="{{  $label }}"
    @if ($format)
        data-action="text-editor#format"
        data-text-editor-format-param="{{ is_array($format) ? json_encode($format) : $format }}"
    @endif
    class="btn btn-icon"
>
    <x-icon :path="$icon"/>
</button>
