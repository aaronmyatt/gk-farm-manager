<div>
    <label for="{{ $label }}-{{ $dataType }}"
        class="block text-sm font-medium text-gray-700">{{ ucfirst($label) }}</label>
    <div class="relative mt-1 rounded-md shadow-sm">
        <input 
            {{ $attributes->wire('model') }}
            type="{{ $dataType }}" name="{{ $label }}-{{ $dataType }}" id="{{ $label }}-{{ $dataType }}" step="0.01"    
            class="block w-full pr-10 @error($attributes->wire('model')->value()) text-red-900 placeholder-red-300 border-red-300 rounded-md focus:outline-none focus:ring-red-500 focus:border-red-500 @enderror sm:text-sm"
            placeholder="{{ $placeholder }}" aria-invalid="true" aria-describedby="{{ $label }}-error">
        @error($attributes->wire('model')->value())
            <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                <!-- Heroicon name: exclamation-circle -->
                <svg class="w-5 h-5 text-red-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                    aria-hidden="true">
                    <path fill-rule="evenodd"
                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                        clip-rule="evenodd" />
                </svg>
            </div>
        @enderror
    </div>
    @error($attributes->wire('model')->value())
    <p class="mt-2 text-sm text-red-600" id="{{ $label }}-error">{{ $errorMessage }}</p>
    @enderror
</div>