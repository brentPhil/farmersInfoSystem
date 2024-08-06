<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="font-semibold capitalize text-xl leading-tight">
                {{ __('List of main livelihood') }}
            </h2>
            @include('farmers.partials.add-farmer')
        </div>
    </x-slot>

    <div class="p-6 overflow-hidden bg-white rounded-md shadow-md dark:bg-dark-eval-1">
        <div class="overflow-x-auto">

        </div>
    </div>
</x-app-layout>
