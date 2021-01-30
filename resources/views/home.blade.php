<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __(ucfirst(Route::currentRouteName())) }}
        </h2>
    </x-slot>

    <div>
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">

            <x-button-grid></x-button-grid>

        </div>
    </div>
</x-app-layout>