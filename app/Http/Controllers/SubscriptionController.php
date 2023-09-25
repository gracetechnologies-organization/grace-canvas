<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function create(Request $request)
    {
        try {
            $user = auth()->user();
            auth()->user()->newSubscription($request->name, $request->plan)->create($request->paymentMethod);
            // Get the user's subscription by name ('Premium' in this case)
            $subscription = $user->subscription($request->name); 
            if ($subscription) {
                // Update the subscription if it exists
                $subscription->update([
                    'trial_ends_at' => now()->addMonths($request->month),
                ]);
            } else {
                // Create a new subscription if it doesn't exist
                $user->newSubscription($request->name, $request->plan)
                    ->trialDays($request->month * 30) // Set the trial period in days based on months
                    ->create($request->paymentMethod);
            }
            return redirect()->route('subscription')->with('success', 'Your Subscription Successful');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
