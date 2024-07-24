<div class="inputArea">
    <label for="{{ $name }}">
        {{ $label ?? '' }}
    </label>
    <select id="{{ $name }}" name="{{ $name }}" {{ empty($required) ? '' : 'required' }}>
        <option value="" disabled {{ old($name) ? '' : 'selected' }}>Selecione uma categoria</option>
        {{ $slot }}
    </select>
</div>
