<?php

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Card extends Component
{
    public $title;
    public $sizeClass;

    /**
     * Create a new component instance.
     *
     * @param $title
     * @param string $size
     */
    public function __construct($title, $size = 'medium')
    {
        $sizeClasses = [
            'medium' => 'w-11/12 sm:w-5/6 md:w-3/4 lg:w-2/3 xl:w-1/2',
            'large' => 'w-11/12 md:w-5/6 xl:w-3/4',
        ];

        $this->title = $title;
        $this->sizeClass = $sizeClasses[$size];
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|string
     */
    public function render()
    {
        return view('components.card');
    }
}
