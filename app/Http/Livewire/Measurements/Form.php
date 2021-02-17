<?php

namespace App\Http\Livewire\Measurements;

use App\Models\Measurements;
use App\Models\Sites;
use App\Models\Tanks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Form extends Component
{

    public Measurements $measurement;
    public $site_id;
    
    protected $rules = [
        'measurement.tank_id' => 'required|numeric',
        'measurement.ph' => 'numeric|between:1,14',
        'measurement.alkalinity' => 'numeric',
        'measurement.nh3' => 'numeric',
        'measurement.no2' => 'numeric',
        'measurement.no3' => 'numeric',
        'measurement.fe' => 'numeric',
        'measurement.salinity' => 'numeric',
        'measurement.temperature' => 'numeric',
        'measurement.remark' => 'string'
    ];

    public function mount(Request $request){
        $tank_id = $request->route('tank_id');
        $this->measurement = new Measurements();

        if($tank_id){
            $tank =  Tanks::findOrFail($tank_id);
            $this->measurement->tank_id = $tank->id;
            $this->site_id = $tank->site_id;
        } 
    }

    public function updated($name)
    {
        if($name == "site_id"){
            $this->measurement->tank_id = null;
        }
    }

    public function getSitesProperty(){
        return Sites::all();
    }

    public function getTanksProperty(){
        $site_id = $this->site_id;
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

        $this->measurement->created_by = Auth::id();
        $this->measurement->updated_by = Auth::id();
        $this->measurement->save();
        return redirect()->route('measurements');
    }

    public function render()
    {
        return view('livewire.measurements.form');
    }
}
