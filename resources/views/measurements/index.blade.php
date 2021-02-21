<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between space-x-4 md:justify-start">    
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                {{ __(ucfirst(Route::currentRouteName())) }}
                
            </h2>

            <x-elements.button label="Add New" href="{{ route('measurements-form') }}" />
        </div>
    </x-slot>

    <div class="py-6">
        <div class="px-2 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="bg-white shadow-xl sm:rounded-lg">
                <livewire:measurement-datatable />
            </div>
        </div>
    </div>
</x-app-layout>
