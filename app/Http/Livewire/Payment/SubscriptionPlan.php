<?php

namespace App\Http\Livewire\Payment;

use App\Models\Plan;
use Livewire\Component;

class SubscriptionPlan extends Component
{
    public $Plans, $intent;
    
    public function constructor()
    {
        // Initializing the property with a numeric value
        $this->intent = auth()->user()->createSetupIntent();;
    }

    public function mount()
    {
        $this->Plans = Plan::all();
    }

    public function render()
    {
        return view('livewire.payment.subscription-plan');
    }
}
