<?php

namespace App\Http\Livewire\Livestock;

use App\Models\Livestock;
use App\Models\Sites;
use Livewire\Component;

class Form extends Component
{

    public Livestock $livestock;
    
    protected $rules = [
        'livestock.site_id' => 'required|numeric',
        'livestock.tank_id' => 'required|numeric',
        'livestock.gender' => 'required|in:female,male',
        'livestock.body_weight_grams' => 'numeric',
        'livestock.number_of_pieces' => 'numeric',
        
    ];

    public function mount(){
        $this->livestock = new Livestock();
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
        $site_id = $this->livestock->site_id;
        if($site_id){
            $tanks = Sites::find($site_id)->tanks;
            if($tanks->isNotEmpty() && $this->livestock->tank_id == null){
                $this->livestock->tank_id = $tanks->first()->id;
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
        Ray($this->livestock)->green();
        $this->validate();
    }

    public function render()
    {
        return view('livewire.livestock.form');
    }
}

