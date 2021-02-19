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

                <x-table>  
                    <x-slot name="tableHeader">
                        <x-table-head-item>
                            Tank Name
                        </x-table-head-item>
                        <x-table-head-item>
                            Located At
                        </x-table-head-item>
                        <x-table-head-item>
                            Remark
                        </x-table-head-item>
                        <x-table-head-item class="hidden sm:table-cell">
                            Readings
                        </x-table-head-item>
                    </x-slot>
                    
                    
                    @foreach($measurements as $measurement)
                    <tr>
                        <td class="px-6 py-3 text-sm font-medium text-blue-700">
                            <a 
                                class="hover:border-b-2 hover:border-blue-500"
                                href="{{ route('tankDetails', ['id' => $measurement->tank->id]) }}"
                            > 
                                {{ $measurement->tank->name }}
                            </a>
                        </td>
                        <td class="px-6 py-3 text-sm font-medium text-blue-700">
                            <a 
                                class="hover:border-b-2 hover:border-blue-500"
                                href="{{ route('sites') }}"
                            > 
                                {{ $measurement->tank->site->name }}
                            </a>
                            
                        </td>
                        <td class="w-1/3 px-6 py-3 text-sm font-medium">
                            {{ $measurement->remark }}
                        </td>
                        <td class="hidden w-1/3 px-6 py-3 text-sm font-medium sm:table-cell">
                            <?php
                                $stats = collect([
                                    [
                                        "label" => "pH",
                                        "data" => $measurement->ph
                                    ],
                                    [
                                        "label" => "Alkalinity",
                                        "data" => $measurement->alkalinity
                                    ],
                                    [
                                        "label" => "NH3",
                                        "data" => $measurement->nh3
                                    ],
                                    [
                                        "label" => "NO2",
                                        "data" => $measurement->no2
                                    ],
                                    [
                                        "label" => "NO3",
                                        "data" => $measurement->no3
                                    ],
                                    [
                                        "label" => "FE",
                                        "data" => $measurement->fe
                                    ],
                                    [
                                        "label" => "Salinity",
                                        "data" => $measurement->salinity
                                    ],
                                    [
                                        "label" => "Temperate",
                                        "data" => $measurement->temperature
                                    ]
                                ]);
                            ?>
                            <x-stat-grid :stats="$stats"> </x-stat-grid>
                        </td>

                        {{-- <td class="pr-6">
                            <div class="relative flex items-center justify-end">
                            <button id="project-options-menu-0" aria-haspopup="true" type="button" class="inline-flex items-center justify-center w-8 h-8 text-gray-400 bg-white rounded-full hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">
                                <span class="sr-only">Open options</span>
                                <!-- Heroicon name: dots-vertical -->
                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z" />
                                </svg>
                            </button>
                            <!--
                                Dropdown panel, show/hide based on dropdown state.

                                Entering: "transition ease-out duration-100"
                                From: "transform opacity-0 scale-95"
                                To: "transform opacity-100 scale-100"
                                Leaving: "transition ease-in duration-75"
                                From: "transform opacity-100 scale-100"
                                To: "transform opacity-0 scale-95"
                            -->
                            <div class="absolute top-0 z-10 w-48 mx-3 mt-1 origin-top-right bg-white divide-y divide-gray-200 rounded-md shadow-lg right-7 ring-1 ring-black ring-opacity-5" role="menu" aria-orientation="vertical" aria-labelledby="project-options-menu-0">
                                <div class="py-1" role="none">
                                <a href="#" class="flex items-center px-4 py-2 text-sm text-gray-700 group hover:bg-gray-100 hover:text-gray-900" role="menuitem">
                                    <!-- Heroicon name: pencil-alt -->
                                    <svg class="w-5 h-5 mr-3 text-gray-400 group-hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                        <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
                                    </svg>
                                    Edit
                                </a>
                                <a href="#" class="flex items-center px-4 py-2 text-sm text-gray-700 group hover:bg-gray-100 hover:text-gray-900" role="menuitem">
                                    <!-- Heroicon name: duplicate -->
                                    <svg class="w-5 h-5 mr-3 text-gray-400 group-hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path d="M7 9a2 2 0 012-2h6a2 2 0 012 2v6a2 2 0 01-2 2H9a2 2 0 01-2-2V9z" />
                                    <path d="M5 3a2 2 0 00-2 2v6a2 2 0 002 2V5h8a2 2 0 00-2-2H5z" />
                                    </svg>
                                    Duplicate
                                </a>
                                <a href="#" class="flex items-center px-4 py-2 text-sm text-gray-700 group hover:bg-gray-100 hover:text-gray-900" role="menuitem">
                                    <!-- Heroicon name: user-add -->
                                    <svg class="w-5 h-5 mr-3 text-gray-400 group-hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6zM16 7a1 1 0 10-2 0v1h-1a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V7z" />
                                    </svg>
                                    Share
                                </a>
                                </div>
                                <div class="py-1" role="none">
                                <a href="#" class="flex items-center px-4 py-2 text-sm text-gray-700 group hover:bg-gray-100 hover:text-gray-900" role="menuitem">
                                    <!-- Heroicon name: trash -->
                                    <svg class="w-5 h-5 mr-3 text-gray-400 group-hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                    </svg>
                                    Delete
                                </a>
                                </div>
                            </div>
                            </div>
                        </td> --}}
                    </tr>
                    @endforeach
                </x-table>
            </div>
            {{ $measurements->links() }}
        </div>
    </div>
</x-app-layout>
