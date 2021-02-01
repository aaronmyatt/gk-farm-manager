<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class Input extends Component
{
    public $label;
    public $dataType;
    public $placeholder;
    public $errorMessage;

    public function __construct(String $label, String $dataType='text',  String $placeholder = '', String $errorMessage = '')
    {
        $this->label = $label;
        $this->dataType = $dataType;
        $this->placeholder = $placeholder;
        $this->errorMessage = $errorMessage;
    }

    public function render()
    {
        return view('components.form.input');
    }
}
