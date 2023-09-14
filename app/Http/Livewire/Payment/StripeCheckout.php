<?php

namespace App\Http\Livewire\Payment;

use App\Models\Plan;
use Illuminate\Http\Request;
use Livewire\Component;
use App\Services\StripeHelpers;

// class StripeCheckout extends Component
// {
//     public function render(Plan $Plan ,Request $request)
//     {
//         $intent = StripeHelpers::createUserIntent();
//         return view('livewire.payment.stripe-checkout' ,compact('Plan','intent'));
//     }

// }
class StripeCheckout extends Component
{
    // Public property to store the selected plan
    public $Plan;

    public function mount(Plan $Plan)
    {
        $this->Plan = $Plan; // Set the selected plan
    }

    public function render()
    {
        $intent = auth()->user()->createSetupIntent();
        return view('livewire.payment.stripe-checkout', compact('intent'));
    }

    public function subscription(Request $request ,Plan $plan)
    {
        // dd($request->all());die;
        $paymentMethods =   $request->user()->paymentMethods();
        dd($paymentMethods);
        $plan = Plan::find($request->plan);
        $subscription = $request->user()->newSubscription($request->plan, $plan->stripe_plan)
                        ->create($request->stripeToken);

        return redirect("/payment/plans")->with('success',' Subscription purchase successfully!');

    }
}
