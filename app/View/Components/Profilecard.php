<?php

namespace App\View\Components;

use App\Models\DayOfWeek;
use App\Models\WorkDay;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Profilecard extends Component
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
    public $department;
    public $allDays;

    public function __construct($employee)
    {
        $this->employee = $employee;
        $this->expertises = $employee->expertises->map(function ($item) {
            return $item->name;
        })->toArray();
        $this->workingDays = $employee->workDays->map(function ($item) {
            return $item->name;
        })->toArray();
        if ($employee->departments->first() != null)  $this->department = $employee->departments->first()->name;
        else $this->department = 'Geen Afdeling';
        if ($employee->user->roles->first() != null)  $this->function = $employee->user->roles->first()->name;
        else $this->function = 'Geen Functie';
        $this->allDays = WorkDay::all()->pluck('name');
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
