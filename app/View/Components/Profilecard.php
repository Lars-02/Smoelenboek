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
    public $courses;
    public $minors;
    public $hobbies;
    public $lectorates;
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
        if ($employee->departments->first() != null) $this->department = $employee->departments->first()->name;
        else $this->department = 'Geen Afdeling';
        if ($employee->user->roles->first() != null) $this->function = $employee->user->roles->first()->name;
        else $this->function = 'Geen Functie';
        $this->allDays = WorkDay::all()->pluck('name');

        $infoLists = 0;

        $this->expertises = $this->MapList($employee->expertises);
        if (!isset($this->expertises))
            $infoLists++;

        $this->courses = $this->MapList($employee->courses);
        if (!isset($this->courses))
            $infoLists++;

        if ($infoLists <= 0)
            return;
        $infoLists--;

        $this->minors = $this->MapList($employee->minors);
        if (!isset($this->minors))
            $infoLists++;

        if ($infoLists <= 0)
            return;
        $infoLists--;

        $this->hobbies = $this->MapList($employee->hobbies);
        if (!isset($this->hobbies))
            $infoLists++;

        if ($infoLists <= 0)
            return;

        $this->lectorates = $this->MapList($employee->lectorates);
    }

    private function MapList($startList)
    {
        $mappedList = array_slice($startList->map(function ($item) {
            return $item->name;
        })->toArray(), 0, 2);
        return empty($mappedList) ? null : $mappedList;
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
