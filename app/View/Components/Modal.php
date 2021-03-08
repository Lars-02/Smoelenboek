<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Modal extends Component
{
    public $title;
    public $message;
    public $buttonLeft;
    public $buttonRight;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title, $message, $buttonLeft, $buttonRight)
    {
        $this->title = $title;
        $this->message = $message;
        $this->buttonLeft = $buttonLeft;
        $this->buttonRight = $buttonRight;
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
