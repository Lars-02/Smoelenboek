<?php

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class time extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|string
     */
    public function render()
    {
        return view('components.time');
    }
}
