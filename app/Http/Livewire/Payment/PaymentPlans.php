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
    public $selectedPlan; // Public property to store the selected plan

    // Method to handle the selection of a plan
    public function selectPlan($PlanId)
    {
        $this->selectedPlan = Plan::find($PlanId);// Redirect to the checkout page with the selected plan
        return redirect()->route('plan.checkout', ['Plan' => $this->selectedPlan->id]);
    }

    public function render()
    {
        $Plans = Plan::getPlans();
        return view('livewire.payment.payment-plans', compact('Plans'));
    }

}
