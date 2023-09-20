<?php

namespace App\Http\Livewire\UserDashboard;

use App\Models\SubcribePlan;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Laravel\Cashier\Subscription;
use Livewire\Component;

class UserDashboardSubcribtion extends Component
{
    public $Subscriptions ; 

    public function mount() {
        $this->Subscriptions = Subscription::where('user_id',auth()->id())->get();
    }

    public function render()
    {
        // dd($this->Subscriptions);

        return view('livewire.user-dashboard.user-dashboard-subcribtion');
    }
}
