<div class="inputArea">
    <label for="{{ $name }}">
        {{ $label ?? '' }}
    </label>
    <input
        type="checkbox" 
        id="{{ $name }}" name="{{ $name }}"
        {{ empty($required) ? '' : 'required' }} 
        value="1" {{-- checked para ir pro db --}}
        {{$checked ? 'checked' : ''}}
    />
</div>
