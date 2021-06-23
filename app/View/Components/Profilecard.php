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
    public $items;
    public $function;
    public $department;
    public $allDays;
    public $workingDays;

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


        if ($this->MapList($employee->expertises) !== false) {
            $this->items = ['Expertise', $this->MapList($employee->expertises)];
            return;
        }
        if ($this->MapList($employee->courses) !== false) {
            $this->items = ['Cursus', $this->MapList($employee->courses)];
            return;
        }
        if ($this->MapList($employee->minors) !== false) {
            $this->items = ['Minors', $this->MapList($employee->minors)];
            return;
        }
        if ($this->MapList($employee->hobbies) !== false) {
            $this->items = ["Hobby's", $this->MapList($employee->hobbies)];
            return;
        }
        if ($this->MapList($employee->lecorates) !== false) {
            $this->items = ['Lectoraten', $this->MapList($employee->lecorates)];
        }
    }

    /**
     * @param $startList
     * @return array|false
     */
    private function MapList($startList)
    {
        if (empty($startList))
            return false;
        $mappedList = array_slice($startList->map(function ($item) {
            return $item->name;
        })->toArray(), 0, 2);
        return empty($mappedList) ? false : $mappedList;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|string
     */
    public
    function render()
    {
        return view('components.profilecard');
    }
}
