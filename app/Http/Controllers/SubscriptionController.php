<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function create(Request $request)
    {
        try {
            auth()->user()->newSubscription('cashier', $request->plan)->create($request->paymentMethod);

            return redirect()->route('subscription')->with('success', 'Your Subscription Successfull');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        // return redirect('/subscription')->with('success', 'سبسکرپشن کامیابی سے بنایا گیا ہے۔');
    }
}
