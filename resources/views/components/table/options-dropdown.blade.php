@props(['id'])

<td x-data="{
    'showDropdown': false
    }" 
    class="pr-6 md:hidden"
>
    <div class="relative flex items-center justify-end">
    <button 
        @click="showDropdown = !showDropdown"
        id="tank-options-menu-{{$id}}" aria-haspopup="true" type="button" class="inline-flex items-center justify-center w-8 h-8 text-gray-400 bg-white rounded-full hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">
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
    <div
        @click.away="showDropdown = false"
        x-show="showDropdown"
        class="absolute top-0 z-10 w-64 mt-1 origin-top-right bg-white divide-y divide-gray-200 rounded-md shadow-lg right-7 ring-1 ring-black ring-opacity-5" role="menu" aria-orientation="vertical" aria-labelledby="tank-options-menu-{{$id}}">
        <div class="py-1" role="none">
            <a href="#" class="flex items-center px-4 py-2 text-base text-gray-700 group hover:bg-gray-100 hover:text-gray-900" role="menuitem">
                <svg class="w-6 h-6 mr-3 text-gray-400 group-hover:text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01">
                </path>
            </svg>
            Measure Water Quality
            </a>
        <a href="#" class="flex items-center px-4 py-2 text-base text-gray-700 group hover:bg-gray-100 hover:text-gray-900" role="menuitem">
            <svg class="w-6 h-6 mr-3 text-gray-400 group-hover:text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
            xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z">
            </path>
        </svg>
        Count Livestock
        </a>
    </div>
    </div>
</td>