@props(['optionMenu' => false])

<div class="mt-8 sm:block">
    <div class="inline-block min-w-full align-middle border-b border-gray-200">
        <table class="min-w-full">
            <thead>
                <tr class="border-t border-gray-200">
                    {{ $tableHeader }}
                    
                    @if($optionMenu)
                        <th class="py-3 pr-6 text-xs font-medium tracking-wider text-right text-gray-500 uppercase border-b border-gray-200 bg-gray-50"></th>
                    @endif
                </tr>
            </thead>
        <tbody class="bg-white divide-y divide-gray-100">
            {{ $slot }}
        </tbody>
        </table>
    </div>
</div>