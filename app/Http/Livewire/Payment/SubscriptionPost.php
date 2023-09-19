<?php

namespace App\Http\Livewire\Payment;

use App\Models\Plan;
use Illuminate\Http\Request;
use Livewire\Component;

class SubscriptionPost extends Component
{
    public $Plan , $ID ;

    public function mount(Plan $Plan ,$ID)
    {
        $this->ID = $ID ;
        $this->Plan = Plan::getPlanByID($ID);
    }

    public function subscriptionPost(Request $request)
    {
        dd($request->all());die;

    }
    public function render()
    {
        return view('livewire.payment.subscription-post',['intent' => auth()->user()->createSetupIntent()]);
    }
}
