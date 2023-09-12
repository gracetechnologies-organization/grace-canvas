<?php

namespace App\Http\Livewire\Payment;

use App\Models\Plan;
use Livewire\Component;

class PaymentPlans extends Component
{
    public function render()
    {
        $plans = Plan::all();
        return view('livewire.payment.payment-plans',compact('plans'));
    }
}
