<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Modal extends Component
{
    public $messageText;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($messageText)
    {
        $this->messageText = $messageText;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.modal');
    }
}
