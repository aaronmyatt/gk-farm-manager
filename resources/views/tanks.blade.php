<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __(ucfirst(Route::currentRouteName())) }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="px-2 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="bg-white shadow-xl sm:rounded-lg">
                <x-table>  
                    <x-slot name="tableHeader">
                        <x-table-head-item>
                            Name
                        </x-table-head-item>
                        <x-table-head-item>
                            Located At
                        </x-table-head-item>
                        <x-table-head-item class="hidden md:table-cell">
                            Measurements
                        </x-table-head-item>
                        <x-table-head-item class="hidden md:table-cell">
                            Livestock
                        </x-table-head-item>
                    </x-slot>
                    
                    
                    @foreach($tanks as $tank)
                    <tr>
                        <td class="px-6 py-3 text-sm font-medium text-gray-900">
                            {{ $tank->name }}
                        </td>
                       <td class="px-6 py-3 text-sm font-medium text-blue-700">
                            <a 
                                class="hover:border-b-2 hover:border-blue-500"
                                href="{{ route('sites') }}"
                            > 
                                {{ $tank->site->name }}
                            </a>
                        </td>
                        <td class="hidden text-center md:table-cell">
                            <x-elements.button label="Check Water" href="{{ route('measurements-form', ['tank_id' => $tank->id]) }}" />
                        </td>
                        <td class="hidden md:table-cell">
                            <x-elements.button label="Count Livestock" href="{{ route('livestock-form', ['tank_id' => $tank->id]) }}" />

                        </td>

                        <x-table.options-dropdown :id="$loop->index"/>
                    </tr>
                    @endforeach
                </x-table>
            </div>
        </div>
    </div>
</x-app-layout>
