<div>
    <label for="{{ $label }}" class="block text-sm font-medium text-gray-700 capitalize">{{ $label }}</label>
    <select id="{{ $label }}" name="{{ $label }}" {{ $attributes->wire('model') }} class="block w-full py-2 pl-3 pr-10 mt-1 text-base border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
        {{ $slot }}
    </select>
    @error($attributes->wire('model')->value())
        <p class="mt-2 text-sm text-red-600" id="{{ $label }}-error">{{ $errorMessage }}</p>
    @enderror
</div>