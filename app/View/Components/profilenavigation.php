<?php

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class profilenavigation extends Component
{
    public $hrefAccount;
    public $hrefWorkHours;
    public $hrefDelete;
    public $clickAction;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($hrefAccount, $hrefWorkHours, $hrefDelete, $clickAction)
    {
        $this->hrefAccount = $hrefAccount;
        $this->hrefWorkHours = $hrefWorkHours;
        $this->hrefDelete = $hrefDelete;
        $this->clickAction = $clickAction;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|string
     */
    public function render()
    {
        return view('components.profilenavigation');
    }
}
