<?php

namespace App\Http\Middleware;

use App\Models\User;
use Carbon\Carbon;
use Closure;
use Exception;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckSubscriptionStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */

    // public function handle(Request $request, Closure $next): Response
    // {
    //     try {
    //         $user = auth()->user();
    //         $subscription = $user->subscription; // Assuming you have a relationship set up in your User model

    //         if ($subscription &&  now() > $subscription->trial_ends_at) {
    //             // Subscription period has ended, set trial_ends_at to null
    //             $subscription->update(
    //                 [
    //                     'trial_ends_at' => null,
    //                     'ends_at' => now(),
    //                 ]
    //             );
    //             session()->flash('subscription_message', 'Your subscription has expired. Please purchase a new subscription.');
    //         }
    //         return $next($request);
    //     } catch (Exception $e) {
    //         dd($e->getMessage());
    //     }
    // }

    public function handle(Request $request, Closure $next): Response
    {
        try {
            $user = User::getUserData();
            if ($user) {
                $subscription = $user->subscription; // Assuming you have a relationship set up in your User model

                if ($subscription && now() > $subscription->trial_ends_at) {
                    // Subscription period has ended, set trial_ends_at to null
                    $subscription->update([
                        'trial_ends_at' => null,
                        'ends_at' => now(),
                        'is_subscribed' => 0,
                        'subscription_type' => 0,
                        'stripe_status' => 'canceled',
                    ]);

                        session()->flash('subscription_message', 'Your subscription has expired. Purchase a new subscription');
            
                    // session()->flash('subscription_message', '<a href="/purchase">Purchase a new subscription</a>');
                }
            }
            return $next($request);
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
