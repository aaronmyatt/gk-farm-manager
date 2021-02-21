<?php
$value = json_decode($value);
$stats = collect([
    [
        "label" => "pH",
        "data" => $value->ph
    ],
    [
        "label" => "Alkalinity",
        "data" => $value->alkalinity
    ],
    [
        "label" => "NH3",
        "data" => $value->nh3
    ],
    [
        "label" => "NO2",
        "data" => $value->no2
    ],
    [
        "label" => "NO3",
        "data" => $value->no3
    ],
    [
        "label" => "FE",
        "data" => $value->fe
    ],
    [
        "label" => "Salinity",
        "data" => $value->salinity
    ],
    [
        "label" => "Temperate",
        "data" => $value->temperature
    ]
]);
?>

<div class="grid grid-cols-4 grid-rows-2 gap-2">
    @foreach($stats as $stat)
        <div class="p-1 overflow-hidden text-center shadow-md overflow-clip">
            <span class="block"> {{ $stat['label'] }} </span>
            <span> {{ $stat['data'] }} </span>
        </div>
    @endforeach
</div>