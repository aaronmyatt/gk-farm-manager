<div class="space-y-4">

    <x-elements.select label="site" wire:model='measurement.site_id'>
        <option value="" selected> Select a Site </option>
        @foreach ($this->sites as $site)
        <option value="{{ $site->id }}">{{ $site->name }}</option>
        @endforeach
    </x-elements.select>

    <x-elements.select label="tank" wire:model='measurement.tank_id'>
        @foreach ($this->tanks as $tank)
        <option value="{{ $tank->id }}">
            {{ $tank->name }}
        </option>
        @endforeach
    </x-elements.select>

    <x-form.input label="pH" dataType="number" wire:model.defer="measurement.ph" error-message="pH must be between 1 and 14"/>
    <x-form.input label="Alkalinity" dataType="number" wire:model.defer="measurement.alkalinity" />
    <x-form.input label="NH3" dataType="number" wire:model.defer="measurement.nh3" />
    <x-form.input label="NO2" dataType="number" wire:model.defer="measurement.no2" />
    <x-form.input label="NO3" dataType="number" wire:model.defer="measurement.no3" />
    <x-form.input label="FE" dataType="number" wire:model.defer="measurement.fe" />
    <x-form.input label="Salinity" dataType="number" wire:model.defer="measurement.salinity" />
    <x-form.input label="Temperature" dataType="number" wire:model.defer="measurement.temperature" />
    <x-form.textarea label="remark" placeholder="Enter remarks" wire:model.defer="measurement.remark" />
    <div>
        @if($this->measurement->tank_id && $this->measurement->site_id)
        <x-elements.button wire:click="save" label="Save" />
        @else
        <x-elements.disabled-button label="Save" />
        @endif
    </div>

</div>