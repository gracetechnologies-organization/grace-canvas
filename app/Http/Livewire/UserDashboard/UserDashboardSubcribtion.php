<?php

namespace App\Http\Livewire\UserDashboard;

use App\Models\SubcribePlan;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class UserDashboardSubcribtion extends Component
{

    public function render()
    {
        $User = User::userSubscription();
        return view('livewire.user-dashboard.user-dashboard-subcribtion',['User'=>$User]);
    }
}
