<?php

namespace App\Http\Livewire\UserDashboard;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UserDashboardHome extends Component
{
    public function render()
    {
        $data = Auth::user();
        return view('livewire.user-dashboard.user-dashboard-home',['data'=>$data]);
    }
}
