<div>
    @if($href)
        <a 
            {{ $attributes->wire('click') }}
            href="{{ $href }}"
            class="px-4 py-2 text-base font-medium text-white bg-blue-500 border border-transparent rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500"
        >
            {{ $label }}
        </a>
    @else
        <button 
            {{ $attributes->wire('click') }}
            type="button"
            class="px-4 py-2 text-base font-medium text-white bg-blue-500 border border-transparent rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500"
        >
            {{ $label }}
        </button>
    @endif
</div>