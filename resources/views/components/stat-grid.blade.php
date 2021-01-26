<div class="grid grid-cols-4 grid-rows-2 gap-2">
    @foreach($stats as $stat)
        <div class="p-1 overflow-hidden text-center shadow-md overflow-clip">
            <span class="block"> {{ $stat['label'] }} </span>
            <span> {{ $stat['data'] }} </span>
        </div>
    @endforeach
</div>