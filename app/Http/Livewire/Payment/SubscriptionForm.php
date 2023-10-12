<?php

namespace App\Http\Livewire\Payment;

use App\Models\Plan;
use Livewire\Component;

class SubscriptionForm extends Component
{
    public
        $Plan,
        $ID;

    public function mount(Plan $Plan, $ID)
    {
        $this->ID = $ID;
        $this->Plan = Plan::getPlanByID($ID);
    }

    public function render()
    {
        return view('livewire.payment.subscription-form', ['intent' => auth()->user()->createSetupIntent()]);
    }
}
