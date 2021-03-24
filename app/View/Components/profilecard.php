<?php

namespace App\View\Components;

use Illuminate\View\Component;

class profilecard extends Component
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
    public $expertises;
    public $profileLink;
    public $workingDays;
    public $allWorkingDays = ['Monday', 'Thuesday', 'Wednesday', 'Thursday', 'Friday'];
    public $dayAbbreviation = ['Ma', 'Di', 'Wo', 'Do', 'Vr'];

    public function __construct($imageAssetPath, $departementAndFunction, $userName, $email, $telephoneNumber, $expertises = [''], $workingDays = [''], $profileLink = '#')
    {
        $this->imageAssetPath = $imageAssetPath;
        $this->departementAndFunction = $departementAndFunction;
        $this->userName = $userName;
        $this->email = $email;
        $this->telephoneNumber = $telephoneNumber;
        $this->expertises = $expertises;
        $this->profileLink = $profileLink;
        $this->workingDays = $workingDays;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.profilecard');
    }
}
