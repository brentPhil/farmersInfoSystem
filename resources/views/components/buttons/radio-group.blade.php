@props([
    'name' => '',
    'options' => [],
    'selected' => '',
    'required' => false,
])

<div class="flex gap-6 items-center">
    @foreach ($options as $option)
        <div class="flex items-center gap-2">
            <input
                type="radio"
                class="text-green-400 focus:outline-green-400"
                id="{{ $name }}_{{ $option['value'] }}"
                name="{{ $name }}"
                value="{{ $option['value'] }}"
                {{ $required ? 'required' : '' }}
                {{ $selected == $option['value'] ? 'checked' : '' }}
            >
            <label class="form-check-label" for="{{ $name }}_{{ $option['value'] }}">{{ $option['label'] }}</label>
        </div>
    @endforeach
</div>
