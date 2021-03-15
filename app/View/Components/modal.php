<?php

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class modal extends Component
{
    public $icon;
    public $modalTitle;
    public $submitLabel;
    public $cancelLabel;
    public $method;
    public $route;

    /**
     * Create a new component instance.
     *
     * @param $modalTitle
     * @param $route
     * @param string $method
     * @param null $icon
     * @param null $submitLabel
     * @param null $cancelLabel
     */
    public function __construct($modalTitle, $route, $method = 'GET', $icon = null, $submitLabel = null, $cancelLabel = null)
    {
        $this->icon = $icon;
        $this->modalTitle = $modalTitle;
        $this->submitLabel = $submitLabel;
        $this->cancelLabel = $cancelLabel;
        $this->method = $method;
        $this->route = $route;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|string
     */
    public function render()
    {
        return view('components.modal');
    }
}
