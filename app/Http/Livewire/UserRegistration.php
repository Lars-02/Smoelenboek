<?php

namespace App\Http\Livewire;

use App\Models\WorkHour;
use Livewire\Component;

class UserRegistration extends Component
{
    public $weekDays    = ['maandag', 'dinsdag'];
    public $workHours   = [];

    public function mount() {
        $this->workHours = WorkHour::All();
        $this->workHours = [
            ['day' => '', 'start_time' => '', 'end_time' => '']
        ];
    }

    public function addTime() {
        $this->workHours[] = ['day' => '', 'start_time' => '', 'end_time' => ''];
    }

    public function render()
    {
        return view('livewire.user-registration');
    }


}
