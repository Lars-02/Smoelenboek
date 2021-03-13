<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Modal extends Component
{
    public $modal;
    public $title;
    public $buttonNameLeft;
    public $buttonNameRight;
    public $buttonTypeLeft;
    public $buttonTypeRight;
    public $buttonHrefLeft;
    public $buttonHrefRight;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title, $modal,
                                $buttonNameLeft, $buttonNameRight,
                                $buttonTypeLeft = 'button', $buttonTypeRight = 'button',
                                $buttonHrefLeft = '#', $buttonHrefRight ='#')
    {
        $this->title = $title;
        $this->buttonNameLeft = $buttonNameLeft;
        $this->buttonNameRight = $buttonNameRight;
        $this->modal = $modal;
        $this->buttonTypeLeft = $buttonTypeLeft;
        $this->buttonTypeRight = $buttonTypeRight;
        $this->buttonHrefLeft = $buttonHrefLeft;
        $this->buttonHrefRight = $buttonHrefRight;
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
