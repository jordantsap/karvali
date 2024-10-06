<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Role;
use App\Models\Plan;

class Dropdown extends Component
{
    public $roles;
    public $plans;
    public $selectedRole=null;

    public function mount()
    {
        $this->roles=Role::whereIn('id', [3, 4, 5,6])
                    ->get();
        $this->plans=Plan::all();
    }
    public function render()
    {
        return view('livewire.dropdown');
    }

    // public function updatedSelectedRole()
    // {
    //     dd('sdgfdhfghfghfghcfg');
    // }
}
