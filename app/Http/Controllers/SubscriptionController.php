<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Cashier\Subscription;

class SubscriptionController extends Controller
{
    public function create(Request $request)
    {
        try {
            $UserID = User::getUserID();
            $subscription = Subscription::where('user_id', $UserID)->first();

            if ($subscription && $subscription->is_subscribed) {
                return redirect()->route('subscription')->with('subscription_error', 'You are already subscribed to the plan');
            }

            // $user = auth()->user();
            $subscription = auth()->user()->newSubscription($request->name, $request->plan)->create($request->token);
            if ($subscription) {
                if ($subscription->trial_ends_at) $subscription->trial_ends_at = null;
                
                $subscription->trial_ends_at = now()->addMonths($request->month);
                // $subscription->subscription_type = false;
                // $subscription->deleted_at = now();
                $subscription->save();
                // Get the user's subscription by name ('Premium' in this case)
                // $subscription = $user->subscription($request->name);
                // if ($subscription) {
                //     $subscription->create([
                //         'trial_ends_at' => now()->addMonths($request->month),
                //         'is_subscribed' => true,
                //         'subscription_type' => true,
                //     ]);
                // }
            }
            return redirect()->route('subscription')->with('subscription_success', 'Your Subscription Successful');
        } catch (\Exception $e) {
            // Handle exceptions, e.g., display an error message
            return $e->getMessage(); 
        }
    }
}
