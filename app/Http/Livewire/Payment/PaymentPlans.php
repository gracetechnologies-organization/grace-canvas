<?php

namespace App\Http\Livewire\Payment;

use App\Models\Plan;
use Livewire\Component;

// class PaymentPlans extends Component
// {
//     public function render()
//     {
//         $Plans = Plan::all();
//         return view('livewire.payment.payment-plans',compact('Plans'));
//     }
// }
class PaymentPlans extends Component
{
   public $Price;
   public function mount()
   {
       $this->Price = 5;
   }



    public function render()
    {
        return view('livewire.payment.payment-plans');
    }

}
