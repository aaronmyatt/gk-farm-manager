<?php

namespace App\Http\Livewire\Measurements;

use App\Models\Measurements;
use App\Models\Sites;
use Livewire\Component;

class Form extends Component
{

    public Measurements $measurement;
    
    protected $rules = [
        'measurement.site_id' => 'required|numeric',
        'measurement.tank_id' => 'required|numeric',
        'measurement.ph' => 'numeric',
        'measurement.alkalinity' => 'numeric',
        'measurement.nh3' => 'numeric',
        'measurement.no2' => 'numeric',
        'measurement.no3' => 'numeric',
        'measurement.fe' => 'numeric',
        'measurement.salinity' => 'numeric',
        'measurement.temperature' => 'numeric',
        'measurement.remark' => 'string'
    ];

    public function mount(){
        $this->measurement = new Measurements();
    }

    public function updated($name)
    {
        if($name == "measurement.site_id"){
            $this->measurement->tank_id = null;
        }
    }

    public function getSitesProperty(){
        return Sites::all();
    }

    public function getTanksProperty(){
        $site_id = $this->measurement->site_id;
        if($site_id){
            $tanks = Sites::find($site_id)->tanks;
            if($tanks->isNotEmpty() && $this->measurement->tank_id == null){
                $this->measurement->tank_id = $tanks->first()->id;
            }
            return $tanks;
        } else {
            return collect([
                // (object) ["name" => "No tanks", "id" => ""]
            ]);
        }
    }

    public function save()
    {
        Ray($this->measurement)->green();
        $this->validate();
    }

    public function render()
    {
        return view('livewire.measurements.form');
    }
}
