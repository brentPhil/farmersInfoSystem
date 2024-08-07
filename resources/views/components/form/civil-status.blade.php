@props(['selected' => '',])

@php
    $statusOptions = [
        ['value' => 'single', 'label' => 'Single'],
        ['value' => 'married', 'label' => 'Married'],
        ['value' => 'widowed', 'label' => 'Widowed'],
        ['value' => 'separated', 'label' => 'Separated']
    ];
@endphp

<div x-data="{ status: '{{ $selected }}', spouseName: '' }">
    <!-- Radio Button Group -->
    <div class="flex gap-6 items-center">
        @foreach ($statusOptions as $option)
            <div class="flex items-center gap-2">
                <input
                    type="radio"
                    class="text-green-400 focus:outline-green-400"
                    id="status_{{ $option['value'] }}"
                    name="civil_status"
                    value="{{ $option['value'] }}"
                    x-model="status"
                    required
                    {{ $selected == $option['value'] ? 'checked' : '' }}
                >
                <label class="form-check-label" for="status_{{ $option['value'] }}">{{ $option['label'] }}</label>
            </div>
        @endforeach
    </div>

    <!-- Conditional Input Field -->
    <div class="grid mt-4" x-show="status === 'married'">
        <x-form.input
            type="text"
            name="name_spouse"
            id="name_spouse"
            placeholder="Spouse Name"
            required
            label_out
        />
    </div>

</div>
