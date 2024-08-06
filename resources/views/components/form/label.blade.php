@props(['value', 'for' => '', 'important' => false])

<label for="{{$for}}" {{ $attributes->merge(['class' => 'block flex font-bold text-sm text-gray-700 dark:text-gray-300']) }}>
    {{ $value ?? $slot }}
    @if ($important)
        <span class="text-red-500">*</span>
    @endif
</label>
