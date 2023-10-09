<?php

namespace App\Http\Livewire\Payment;

use Livewire\Component;

class PaymentPlans extends Component
{
    public
        $Price;

    public function mount()
    {
        $this->Price = 5;
    }

    public function render()
    {
        return view('livewire.payment.payment-plans');
    }
}
