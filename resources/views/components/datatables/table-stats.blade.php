@php
$month = collect($activeSelectFilters)->filter(function($filter, $key){
        return $key == 1;
    })->flatMap(function($filter){
        return $filter;
    })->first()
@endphp
<div class="relative">
    <div class="relative px-2 mx-auto max-w-7xl sm:px-4 lg:px-6">
    <div class="max-w-4xl mx-auto">
        <dl class="bg-white rounded-lg shadow-lg sm:grid sm:grid-cols-2">
        <div class="flex flex-col p-3 text-center border-b border-gray-100 sm:border-0 sm:border-r">
            <dt class="order-2 text-lg font-medium leading-6 text-gray-500">
            @if($month) Mortality for {{ ucfirst($month) }} @else Total Mortality @endif
            </dt>
            <dd class="order-1 text-5xl font-extrabold text-indigo-600">
            {!! App\Models\Livestock::whereMonth($month)->sum('mortality') !!}
            </dd>
        </div>
        <div class="hidden p-3 text-center border-t border-b border-gray-100 sm:flex-col sm:flex sm:border-0 sm:border-l sm:border-r">
            <dt class="order-2 text-lg font-medium leading-6 text-gray-500">
            @if($month) Records Selected @else Total Records @endif
            </dt>
            <dd class="order-1 text-5xl font-extrabold text-indigo-600">
            {{ App\Models\Livestock::whereMonth($month)->count() }}
            </dd>
        </div>
        </dl>
    </div>
    </div>
</div>
  