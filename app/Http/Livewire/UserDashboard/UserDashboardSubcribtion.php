<?php

namespace App\Http\Livewire\UserDashboard;

use App\Models\SubcribePlan;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Laravel\Cashier\Subscription;
use Livewire\Component;

class UserDashboardSubcribtion extends Component
{
    public
        $Subscriptions,
        $cancelSuccessMessage = '',
        $deleteSuccessMessage = '';

    public function mount()
    {
        // /*
        // |--------------------------------------------------------------------------
        // | The only reason to place this "join" here is bcz "Subscription" is not a 
        // | Custom model infact it is provided by "laravel/cachier" package & we dont
        // | Want to make any changes in the laravel "vendor" directory
        // |--------------------------------------------------------------------------
        // */
        // $this->Subscriptions = Subscription::join('plans', 'subscriptions.stripe_price', '=', 'plans.stripe_plan')
        //     ->select('subscriptions.*', 'plans.name', 'plans.price')
        //     ->where('subscriptions.user_id', Auth::id())
        //     ->get();
    }

    public function cancel($subscriptionId)
    {
        try {
            $subscription = auth()->user()->subscriptions->find($subscriptionId);
            if ($subscription) {
                if ($subscription->trial_ends_at) {
                    $subscription->trial_ends_at = null;
                }
                $subscription->is_subscribed = false;
                $subscription->subscription_type = false;
                // $subscription->deleted_at = now();
                $subscription->save();
                // Cancel the subscription
                $subscription->cancel();
                $this->cancelSuccessMessage = 'Subscription canceled successfully.';
            }
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    // public function cancel()
    // {
    //     $activeSubscriptions = auth()->user()->subscriptions()->active()->get();  // getting all the active subscriptions
    //     foreach ($activeSubscriptions as $subscription) {
    //         $subscription->cancel(); // cancelling each of the active subscription
    //     }
    //      $this->cancelSuccessMessage = 'Subscription canceled successfully.';
    // }

    public function delete($subscriptionId)
    {
        try {
            $subscription = auth()->user()->subscriptions->find($subscriptionId);
            if (!$subscription) {
                return redirect()->back()->with('error', 'Subscription not found.');
            }

            if ($subscription->stripe_status == 'canceled') {
                $subscription->delete();
                $this->cancelSuccessMessage = 'Subscription has been deleted.';
            } else {
                $this->cancelSuccessMessage = 'Subscription cannot be deleted as it is not canceled.';
            }
        } catch (Exception $Error) {
            report($Error);
            return $Error->getMessage();
        }
    }

    public function render()
    {
        /*
        |--------------------------------------------------------------------------
        | The only reason to place this "join" here is bcz "Subscription" is not a 
        | Custom model infact it is provided by "laravel/cachier" package & we dont
        | Want to make any changes in the laravel "vendor" directory as it is not
        | Included in our commits
        |--------------------------------------------------------------------------
        */
        $this->Subscriptions = Subscription::join('plans', 'subscriptions.stripe_price', '=', 'plans.stripe_plan')
            ->select('subscriptions.*', 'plans.name', 'plans.price')
            ->where('subscriptions.user_id', Auth::id())
            ->get();
        return view('livewire.user-dashboard.user-dashboard-subcribtion');
    }
}
