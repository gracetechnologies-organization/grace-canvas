<?php

namespace App\Http\Livewire\UserDashboard;

use Livewire\Component;

class UserDashboard extends Component
{
    public
        $Count = 0;

    public function incCounter()
    {
        ++$this->Count;
    }

    public function render()
    {
        return view('livewire.user-dashboard.user-dashboard');
    }
}
