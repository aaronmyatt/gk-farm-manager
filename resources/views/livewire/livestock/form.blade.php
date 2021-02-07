<div class="space-y-4">

    <x-elements.select label="site" wire:model='livestock.site_id'>
        <option value="" selected> Select a Site </option>
        @foreach ($this->sites as $site)
        <option value="{{ $site->id }}">{{ $site->name }}</option>
        @endforeach
    </x-elements.select>

    <x-elements.select label="tank" wire:model='livestock.tank_id'>
        @foreach ($this->tanks as $tank)
        <option value="{{ $tank->id }}">
            {{ $tank->name }}
        </option>
        @endforeach
    </x-elements.select>

    <x-elements.select label="gender" wire:model='livestock.gender' error-message="A gender must be chosen">
        <option selected value="female">
            Female
        </option>
        <option value="male">
            Male
        </option>
    </x-elements.select>

    <x-form.input label="Body Weight (g)" dataType="number" wire:model.defer="livestock.body_weight_grams" />
    <x-form.input label="Number of Pieces" dataType="number" wire:model.defer="livestock.number_of_pieces" />


    <div>
        @if($this->livestock->tank_id && $this->livestock->site_id)
        <x-elements.button wire:click="save" label="Save" />
        @else
        <x-elements.disabled-button label="Save" />
        @endif
    </div>

</div>