<?php

namespace App\View\Components\Elements;

use Illuminate\View\Component;

class Select extends Component
{
    public $label;

    public function __construct(String $label)
    {
        $this->label = $label;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.elements.select');
    }
}
