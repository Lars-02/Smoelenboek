<?php

namespace App\View\Components;

use Illuminate\View\Component;

class card extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $imageAssetPath;
    public $departementAndFunction;
    public $userName;
    public $email;
    public $telephoneNumber;
    public $expertise;
    public $profileLink;
    public $workweek;

    public function __construct($imageAssetPath, $departementAndFunction, $userName, $email, $telephoneNumber, $expertise = ['Webdev', 'Computeren', 'Databases'], $workweek = ['Maandag', 'Woensdag'], $profileLink = '#')
    {
        $this->imageAssetPath = $imageAssetPath;
        $this->departementAndFunction = $departementAndFunction;
        $this->userName = $userName;
        $this->email = $email;
        $this->telephoneNumber = $telephoneNumber;
        $this->expertise = $expertise;
        $this->profileLink = $profileLink;
        $this->workweek = $workweek;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.card');
    }
}
