<?php

namespace App\View\Components;

use Illuminate\View\Component;

class StatGrid extends Component
{
    public $stats;

    public function __construct($stats = [])
    {
        $this->stats = $stats; 
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.stat-grid');
    }
}
