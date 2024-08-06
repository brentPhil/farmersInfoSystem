@props([
    'disabled' => false,
    'withicon' => false,
    'required' => false,
    'type' => 'text',
    'name' => '',
    'id' => '',
    'value' => '',
    'placeholder' => '',
    'autocomplete' => 'off',
    'label_out' => false
])

@php
    $withiconClasses = $withicon ? 'pl-11 pr-4' : 'px-4';
@endphp
<div class="grid">
    @if($placeholder && $label_out)
        <x-form.label value="{{ $placeholder }}" important="{{ $required }}" for="{{ $name }}" class="my-1" />
    @endif
    <input
        {{ $disabled ? 'disabled' : '' }}
        {!! $attributes->merge([
                'class' => $withiconClasses . ' py-2 border-gray-400 rounded-md focus:border-gray-400 focus:ring
                focus:ring-green-500 focus:ring-offset-2 focus:ring-offset-white dark:border-gray-600 dark:bg-dark-eval-1
                dark:text-gray-300 dark:focus:ring-offset-dark-eval-1',
            ])
        !!}
        {{ $required ? 'required' : '' }}
        type="{{ $type }}"
        name="{{ $name }}"
        id="{{ $id }}"
        value="{{ $value }}"
        placeholder="{{ !$label_out ? $placeholder : '' }}"
        autocomplete="{{ $autocomplete }}"
    />
</div>
