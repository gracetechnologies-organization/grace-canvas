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

    public function cancel($subscriptionId)
    {
        // Find the subscription by ID and check if it belongs to the authenticated user
        $subscription = auth()->user()->subscriptions->find($subscriptionId);

        if ($subscription) {
            // Check if the subscription has a value in the 'trial_ends_at' column
            if ($subscription->trial_ends_at) {
                // Set 'trial_ends_at' to null
                $subscription->trial_ends_at = null;
                $subscription->save();
            }
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
