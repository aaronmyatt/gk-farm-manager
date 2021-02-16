<?php

namespace App\Http\Livewire\Livestock;

use App\Models\Livestock;
use App\Models\Sites;
use App\Models\Tanks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Form extends Component
{
    public $site_id;
    public Livestock $livestock;
    
    protected $rules = [
        'livestock.tank_id' => 'required|numeric',
        'livestock.gender' => 'required|in:female,male',
        'livestock.body_weight_grams' => 'numeric',
        'livestock.number_of_pieces' => 'numeric',
        'livestock.mortality' => 'numeric',
    ];

    public function mount(Request $request){
        $id = $request->route('id');
        $tank_id = $request->route('tank_id');

        $this->livestock = Livestock::findOrNew($id);

        $this->site_id = $this->livestock->site ? $this->livestock->site->id : $this->sites->first()->id;

        if($tank_id){
            $tank =  Tanks::findOrFail($request->route('tank_id'));
            $this->livestock->tank_id = $tank->id;
            $this->site_id = $tank->site->id;
        } 
    }

    public function updated($name)
    {
        if($name == "livestock.site_id"){
            $this->livestock->tank_id = null;
        }
    }

    public function getSitesProperty(){
        return Sites::all();
    }

    public function getActiveSiteProperty(){
        return Sites::find($this->site_id);
    }

    public function getTanksProperty(){
        $tanks = $this->activeSite->tanks;
        if($tanks->isNotEmpty() && $this->livestock->tank_id == null){
            $this->livestock->tank_id = $tanks->first()->id;
        }
        return $tanks;
    }

    public function save()
    {
        Ray($this->livestock)->green();
        $this->validate();

        $this->livestock->created_by = Auth::id();
        $this->livestock->updated_by = Auth::id();
        $this->livestock->save();
        return redirect()->route('livestock');
    }

    public function render()
    {
        return view('livewire.livestock.form');
    }
}

