<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class alert extends Component
{
    public $type;
    public $message;
    public $dismissable;

    protected $types = [
        "success",
        "danger",
        "info"
    ];
    /**
     * Create a new component instance.
     */
    public function __construct($type="info", $message="No Status",$dismissable=false)
    {
        //
        $this->type = $type;
        $this->message = $message;
        $this->dismissable = $dismissable;
    }

    public function validtype(){
        return in_array($this->type,$this->types) ? $this->type : "info";
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.alert');
    }
}
