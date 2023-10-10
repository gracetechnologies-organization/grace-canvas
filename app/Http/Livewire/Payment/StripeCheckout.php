<?php

namespace App\Http\Livewire\Payment;

use App\Models\User;
use Illuminate\Http\Request;
use Livewire\Component;
use Illuminate\Support\Facades\Session;
use Stripe;

class StripeCheckout extends Component
{
    public
        $Price;

    public function mount($Price)
    {
        $this->Price = $Price;
    }

    public function stripePayment(Request $request)
    {
        $User = User::getUserData();
        $Price = $request->Price;
        // Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Stripe::setApiKey('sk_test_51Nng5dAJ0BhvCZp9JbtS4lijZjbkXjaTTVmKmyfFYIp0ipZPTU1G3eyMnZYml0YRxTL1gIjyRkauCi5T2O3b9oo60081Qm2iKl');

        Stripe\Charge::create([
            "amount" => $Price * 100,
            "currency" => "usd",
            "source" => $request->stripeToken,
            "description" => "
                            Customer Name : $User->name
                            Customer Email : $User->email
                            Purchase a pakege : $Price
                            ",
        ]);

        Session::flash('success', 'Payment successful!');

        return back();
    }


    public function render()
    {
        $User = User::getUserData();
        return view('livewire.payment.stripe-checkout', compact('User'));
    }
}
