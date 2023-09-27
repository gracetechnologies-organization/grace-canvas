<?php

namespace App\Http\Livewire\UserDashboard;

use App\Models\SubcribePlan;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Laravel\Cashier\Subscription;
use Livewire\Component;

class UserDashboardSubcribtion extends Component
{
    public $Subscriptions;
    public $cancelSuccessMessage = '';
    public $deleteSuccessMessage = '';

    public function cancel($subscriptionId)
    {
        $subscription = auth()->user()->subscriptions->find($subscriptionId);
        if ($subscription) {
            if ($subscription->trial_ends_at) {
                $subscription->trial_ends_at = null;
            }
            $subscription->is_subscribed = false;
            $subscription->subscription_type = false;
            $subscription->save();
            // Cancel the subscription
            $subscription->cancel();
            $this->cancelSuccessMessage = 'Subscription canceled successfully.';
        }

        // public function cancel()
        // {
        //     $activeSubscriptions = auth()->user()->subscriptions()->active()->get();  // getting all the active subscriptions

        //     foreach ($activeSubscriptions as $subscription) {
        //         $subscription->cancel(); // cancelling each of the active subscription
        //     }

        //      $this->cancelSuccessMessage = 'Subscription canceled successfully.';
        // }
    }

    public function delete($subscriptionId)
    {
        try {
            // Find the subscription by ID
            $subscription = auth()->user()->subscriptions->find($subscriptionId);
            if (!$subscription) {
                return redirect()->route('subscription')->with('error', 'Subscription not found.');
            }
            // Check if the subscription has been canceled
            if ($subscription->stripe_status === 'canceled') {
                // Delete the subscription from Stripe
                $subscription->cancelNow(); // This will delete the subscription from Stripe
                // Delete the subscription locally
                // $subscription->delete(); // This will delete the subscription record from your database
                $subscription->update(['deleted_at' => now()]);
                $this->cancelSuccessMessage = 'Subscription has been deleted.';
            } else {
                $this->cancelSuccessMessage ='Subscription cannot be deleted as it is not canceled.';
            }
        } catch (\Exception $e) {
            return $e->getMessage(); // Handle exceptions, e.g., display an error message
        }
    }

    public function mount()
    {
        $this->Subscriptions = Subscription::where('user_id', auth()->id())->get();
    }

    public function render()
    {
        // dd($this->Subscriptions);

        return view('livewire.user-dashboard.user-dashboard-subcribtion');
    }
}
