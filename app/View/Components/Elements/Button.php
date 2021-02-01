<?php

namespace App\View\Components\Elements;

use Illuminate\View\Component;

class Button extends Component
{
    public $label;
    public $href;

    public function __construct(String $label, String $href = '')
    {
        $this->label = $label;
        $this->href = $href;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.elements.button');
    }
}
