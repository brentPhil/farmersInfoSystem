@props([
    'disabled' => false,
    'withicon' => false,
    'required' => false,
    'default_val' => '',
    'options' => [], // This should now be an array of objects with 'id' and 'name'
    'selected' => '', // This will store the selected 'id'
    'id' => '',
    'placeholder' => '',
    'name' => '',
    'label_out' => false
])
<div class="grid">
    @if($placeholder && $label_out)
        <x-form.label value="{{ $placeholder }}" important="{{ $required }}" for="{{ $name }}" class="my-1" />
    @endif
    <select
        {{ $disabled ? 'disabled' : '' }}
        {!! $attributes->merge([
                'class' => ($withicon ? 'with-icon-classes ' : '') . 'py-2 border-gray-400 rounded-md focus:border-gray-400 focus:ring
                focus:ring-green-500 focus:ring-offset-2 focus:ring-offset-white dark:border-gray-600 dark:bg-dark-eval-1
                dark:text-gray-300 dark:focus:ring-offset-dark-eval-1',
            ])
        !!}
        {{ $required ? 'required' : '' }}
        {{ $name ? 'name=' . $name : '' }}
        {{ $id ? 'id=' . $id : '' }}
    >
        @if ($default_val && !$label_out) <option value="" disabled selected>{{ $default_val }}</option> @endif
        @if ($placeholder && !$label_out) <option value="" disabled selected>{{ $placeholder }}</option> @endif
        @foreach ($options as $option)
            <option value="{{ $option['id'] }}" {{ $selected == $option['id'] ? 'selected' : '' }}>
                {{ $option['name'] }}
            </option>
        @endforeach
    </select>
</div>
