<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Cashier\Subscription;

class SubscriptionController extends Controller
{
    public function create(Request $request)
    {
        // dd($request->all());
        try {
            $UserID = User::getUserID();
            $subscription = Subscription::where('user_id', $UserID)->first();

            if ($subscription && $subscription->is_subscribed) {
                return redirect()->route('subscription')->with('error', 'You are already subscribed to the plan');
            }
            $user = auth()->user();
            auth()->user()->newSubscription($request->name, $request->plan)->create($request->token);

            // Get the user's subscription by name ('Premium' in this case)
            $subscription = $user->subscription($request->name);
            if ($subscription) {
                // Update subscription details, e.g., trial_ends_at, is_subscribed, and subscription_type
                $subscription->update([
                    'trial_ends_at' => now()->addMonths($request->month),
                    'is_subscribed' => true,
                    'subscription_type' => true,
                ]);
            }

            return redirect()->route('subscription')->with('success', 'Your Subscription Successful');
        } catch (\Exception $e) {
            return $e->getMessage(); // Handle exceptions, e.g., display an error message
        }

    }
}
