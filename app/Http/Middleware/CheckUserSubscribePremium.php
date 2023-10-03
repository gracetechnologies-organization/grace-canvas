<?php

namespace App\Http\Middleware;

use App\Models\Resume;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Cashier\Subscription;
use Symfony\Component\HttpFoundation\Response;

class CheckUserSubscribePremium
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $Resume = Resume::getResumeByID($request->ID);
        // if (!Auth::check()) {
        //     session()->flash('login_error', 'Please login to use  templates');
        //     return redirect()->back();
        // }
        if ($Resume->version == 1) {
            $UserID = auth()->user()->id;
            // Using stripe built-in Subscription model
            $Subscriptions = Subscription::where('user_id', $UserID)->first();
            if ($Subscriptions && $Subscriptions->subscription_type == 1) {
                return $next($request);
            } else {
                session()->flash('not_subscribed_error', 'This template is only available for premium users. Please purchase a premium plan to continue.');
                return redirect()->back();
            }
        } else {
            return $next($request);
        }
    }
}
