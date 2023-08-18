<?php

namespace App\Http\Livewire;

use App\Models\Day;
use App\Models\Session;
use Livewire\Component;

class CompanySchedule extends Component
{
    public $days;
    public $allday;
    public $sessions;
    public $morning;
    public $afternoon;
    public $daysOfWeek = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];

    public function mount()
    {
        $this->days = Day::all();
        $this->sessions = Session::all();
        $this->daysOfWeek;
    }
    public function updatedAllday($value)
    {
        return $value;
    }

    public function render()
    {
        return view('livewire.company-schedule');
    }
}
