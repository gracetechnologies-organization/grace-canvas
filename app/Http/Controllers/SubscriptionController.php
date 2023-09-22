<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    // public function create(Request $request)
    // {
    //     // dd($request->month);
    //     try {
    //         $user = auth()->user();
    //         // Check if the user has already purchased any plan
    //         auth()->user()->newSubscription('Premium', $request->plan)->create($request->paymentMethod);

    //         $subscription = $user->subscriptions->first(); // Get the user's subscription
    //         if ($subscription) {
    //             // Update the subscription if it exists
    //             $subscription->update([
    //                 'trial_ends_at' => now()->addMonths($request->month),
    //             ]);
    //         } else {
    //             // Create a new subscription if it doesn't exist
    //             $user->subscription->create([
    //                 'trial_ends_at' => now()->addMonths($request->month),
    //             ]);
    //         }
    //         return redirect()->route('subscription')->with('success', 'Your Subscription Successfull');
    //     } catch (\Exception $e) {
    //         return $e->getMessage();
    //     }
    // }

    public function create(Request $request)
    {
        // dd($request->all());
        try {
            $user = auth()->user();
            // Check if the user has already purchased any plan
            auth()->user()->newSubscription($request->name, $request->plan)->create($request->paymentMethod);

            $subscription = $user->subscription($request->name); // Get the user's subscription by name ('Premium' in this case)
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
