<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __(ucfirst('Edit Livestock Entry')) }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="px-2 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <livewire:livestock.form />
        </div>
    </div>
</x-app-layout>
