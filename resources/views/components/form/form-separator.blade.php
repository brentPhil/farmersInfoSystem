@props(['label', 'required' => false, 'label_desc' => ''])

<div class="border-b border-gray-200 min-w-[300px] dark:border-b-gray-700 py-4 md:flex justify-between">
    <div class="w-full md:w-6/12 normal-case">
        <x-form.label value="{{ $label }}" important="{{ $required }}" />
        <p class="my-1 text-sm text-gray-600 dark:text-gray-400">
            {{ $label_desc }}
        </p>
    </div>
    <div class="w-full">
        <div class="grid md:max-w-[500px] gap-2">
            {{ $slot }}
        </div>
    </div>
</div>
