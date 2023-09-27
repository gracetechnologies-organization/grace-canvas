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
       if ($Resume->version == 1) {
        if (!Auth::check()) {
             session()->flash('login_error', 'bhai tun login nhi haa , phly login kr ly tak mujhy tery ID mill jay ');
            return redirect()->back();
        }
        $UserID = auth()->user()->id;
        $Subscriptions = Subscription::where('user_id', $UserID)->first();
         if ($Subscriptions && $Subscriptions->subscription_type == 1) {
            return $next($request);
        } else {
            session()->flash('not_subscribed_error', 'Ary Bhai Phly Plan Purchase kr Phir me Tum ko Premium Ka Access Day Dun ,Dhundu ');
            return redirect()->back();
        }
       }else{
        return $next($request);
       }

    }
}
