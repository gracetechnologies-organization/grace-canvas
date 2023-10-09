<?php

namespace App\Http\Livewire\Payment;

use App\Models\Plan;
use Illuminate\Http\Request;
use Livewire\Component;

class SubscriptionPost extends Component
{
    public
        $Plan,
        $ID;

    public function mount(Plan $Plan, $ID)
    {
        $this->ID = $ID;
        $this->Plan = Plan::getPlanByID($ID);
    }

    // public function subscriptionPost(Request $request)
    // {
    //     dd($request->all());
    //     exit;
    //     try {
    //         auth()->user()->newSubscription('cashier', $request->plan)->create($request->paymentMethod);
    //         dd('success');

    //         return redirect()->route('subscription')->with('success', 'Your Subscription Successfull');
    //     } catch (\Exception $e) {
    //         return $e->getMessage();
    //     }
    // }

    public function render()
    {
        return view('livewire.payment.subscription-post', ['intent' => auth()->user()->createSetupIntent()]);
    }
}
