<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Modal extends Component
{
    public $modal;
    public $title;
    public $btnNameLeft;
    public $btnNameRight;
    public $typeLeft;
    public $typeRight;
    public $hrefLeft;
    public $hrefRight;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title, $modal,
                                $btnNameLeft, $btnNameRight,
                                $typeLeft = 'button', $typeRight = 'button',
                                $hrefLeft = '#', $hrefRight ='#')
    {
        $this->title = $title;
        $this->btnNameLeft = $btnNameLeft;
        $this->btnNameRight = $btnNameRight;
        $this->modal = $modal;
        $this->typeLeft = $typeLeft;
        $this->typeRight = $typeRight;
        $this->hrefLeft = $hrefLeft;
        $this->hrefRight = $hrefRight;
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
