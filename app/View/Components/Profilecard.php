<?php

namespace App\View\Components;

use App\Models\DayOfWeek;
use App\Models\WorkDay;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use function PHPUnit\Framework\isEmpty;

class Profilecard extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $employee;
    public $expertises;
    public $courses;
    public $minors;
    public $workingDays;
    public $function;
    public $department;
    public $allDays;

    public function __construct($employee)
    {
        $this->employee = $employee;
        $this->workingDays = $employee->workDays->map(function ($item) {
            return $item->name;
        })->toArray();
        if ($employee->departments->first() != null)  $this->department = $employee->departments->first()->name;
        else $this->department = 'Geen Afdeling';
        if ($employee->user->roles->first() != null)  $this->function = $employee->user->roles->first()->name;
        else $this->function = 'Geen Functie';
        $this->allDays = WorkDay::all()->pluck('name');

        $this->expertises = array_slice($employee->expertises->map(function ($item) {
            return $item->name;
        })->toArray(), 0, 2);
        $this->courses = array_slice($employee->courses->map(function ($item) {
            return $item->name;
        })->toArray(), 0, 2);

        if (empty($this->expertises) || empty($this->courses)) {
            $this->minors = array_slice($employee->minors->map(function ($item) {
                return $item->name;
            })->toArray(), 0, 2);
            return;
        }
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
