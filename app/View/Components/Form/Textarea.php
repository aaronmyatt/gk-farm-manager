<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class Textarea extends Component
{
    public $label;
    public $modelBinding;  
    public $placeholder;
    public $errorMessage;

    public function __construct(String $label, String $modelBinding='', String $placeholder = '', String $errorMessage = '')
    {
        $this->label = $label;
        $this->modelBinding = $modelBinding;
        $this->placeholder = $placeholder;
        $this->errorMessage = $errorMessage;
    }

    public function render()
    {
        return view('components.form.textarea');
    }
}
