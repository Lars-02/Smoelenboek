<?php

namespace App\View\Components;

use Illuminate\View\Component;

class select extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $id;
    public $options;

    public function __construct($id, $options = [''])
    {
        $this->id = $id;
        $this->options = $options;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.select');
    }
}
