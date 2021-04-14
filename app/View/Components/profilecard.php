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
    public $employee;
    public $expertises;
    public $workingDays;
    public $function;
    public $allDays;

    public function __construct($employee)
    {
        $this->employee = $employee;
        $this->expertises = $employee->expertises->map(function ($item) {
            return $item->name;
        })->toArray();
        $this->workingDays = $employee->workHours->map(function ($item) {
            return $item->week->day;
        })->toArray();
        if ($employee->user->roles->first() != null)  $this->function = $employee->user->roles->first()->name;
        else $this->function = 'Geen Functie';
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
