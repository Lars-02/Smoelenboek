<?php

namespace App\View\Components;

use App\Models\DayOfWeek;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class profilecard extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $imageAssetPath;
    public $username;
    public $email;
    public $telephoneNumber;
    public $expertises;
    public $workingDays;
    public $department;
    public $function;
    public $allDays;

    public function __construct($employee)
    {
        $this->imageAssetPath = $employee->user->photoUrl;
        $this->username = $employee->username;
        $this->email = $employee->user->email;
        $this->telephoneNumber = $employee->phoneNumber;
        $this->expertises = $employee->expertises->map(function ($item) {
            return $item->name;
        })->toArray();
        $this->workingDays = $employee->workHours->map(function ($item) {
            return $item->week->day;
        })->toArray();
        $this->function = $employee->user->roles->first()->name;
        $this->department = $employee->department;
        $this->allDays = DayOfWeek::all()->pluck('day');
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|string
     */
    public function render()
    {
        return view('components.profilecard');
    }
}
