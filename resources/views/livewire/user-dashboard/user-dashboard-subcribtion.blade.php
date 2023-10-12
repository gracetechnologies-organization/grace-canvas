<div>
    <div class="container custom-user-dashboard-container">
        @include('components.user-dashboard-heading')
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-6">
                @include('components.user-dashboard-sidebar')
            </div>
            <div class="col-lg-9 col-md-9 col-sm-6">
                <div class="content">
                    <div id="dataContainer">
                        <div class="row">
                            @if (session('subscription_message'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong>{{ session('subscription_message') }}</strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif
                            @if ($cancelSuccessMessage)
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>{{ $cancelSuccessMessage }}</strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif
                            @if ($deleteSuccessMessage)
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>{{ $deleteSuccessMessage }}</strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif
                            @if (session()->has('massage'))
                                <div class="alert alert-denger alert-dismissible fade show" role="alert">
                                    <strong>{{ session()->get('massage') }}</strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif
                            @if (count($Subscriptions) > 0)
                                <table class="table custome-card-border">
                                    <thead>
                                        <tr>
                                            <th scope="col">{{ app('googleTranslator', ['string' => 'PLAN NAME']) }}</th>
                                            <th scope="col">{{ app('googleTranslator', ['string' => 'PRICE']) }}</th>
                                            <th scope="col">{{ app('googleTranslator', ['string' => 'QUANTITY']) }}</th>
                                            <th scope="col">{{ app('googleTranslator', ['string' => 'TRAIL AT END']) }}</th>
                                            <th scope="col">{{ app('googleTranslator', ['string' => 'END AT']) }}</th>
                                            <th scope="col">{{ app('googleTranslator', ['string' => 'STATUS']) }}</th>
                                            <th scope="col">{{ app('googleTranslator', ['string' => 'ACTION']) }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($Subscriptions as $Subscription)
                                            <tr>
                                                <th scope="row">{{ $Subscription->name }}</th>
                                                <td>{{ $Subscription->price }}</td>
                                                <td>{{ $Subscription->quantity }}</td>
                                                <td>
                                                    @if ($Subscription->trial_ends_at == null)
                                                        null
                                                    @else
                                                        {{ $Subscription->trial_ends_at }}
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($Subscription->ends_at == null)
                                                        null
                                                    @else
                                                        {{ $Subscription->ends_at }}
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($Subscription->stripe_status == 'active')
                                                        <span class="badge rounded-pill text-bg-success">{{ $Subscription->stripe_status }}</span>
                                                    @else
                                                        <span class="badge rounded-pill text-bg-danger">{{ $Subscription->stripe_status }}</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($Subscription->ends_at == null)
                                                        {{--  @php
                                                            $trialEndDate = $Subscription->created_at;
                                                            $currentDate = now();
                                                            $daysDifference = $currentDate->diffInDays($trialEndDate);
                                                            @endphp
                                                            @if ($daysDifference < 5)  --}}
                                                        <button type="submit" class="btn btn-danger" wire:loading.class="btn-dark" wire:loading.class.remove="btn-danger" wire:loading.attr="disabled" wire:click="cancel({{ $Subscription->id }})" title="Cancel your subscription">
                                                            <span wire:loading.remove wire:target="cancel({{ $Subscription->id }})">
                                                                <i class='bx bxs-skull'></i>
                                                            </span>
                                                            <span wire:loading wire:target="cancel({{ $Subscription->id }})">
                                                                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                                            </span>
                                                        </button>
                                                        {{--  @endif  --}}
                                                    @endif
                                                    @if ($Subscription->stripe_status == 'canceled')
                                                        <button type="submit" class="btn btn-danger" wire:loading.class="btn-dark" wire:loading.class.remove="btn-danger" wire:loading.attr="disabled" wire:click="delete({{ $Subscription->id }})" title="Delete your subscription">
                                                            <span wire:loading.remove wire:target="delete({{ $Subscription->id }})">
                                                                <i class='bx bxs-trash'></i>
                                                            </span>
                                                            <span wire:loading wire:target="delete({{ $Subscription->id }})">
                                                                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                                            </span>
                                                        </button>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @else
                                <h2>
                                    {{ app('googleTranslator', ['string' => 'You Have Not Subscribed For Any Plan']) }}
                                    <a href="{{ route('subscription') }}">{{ app('googleTranslator', ['string' => 'Subscribe Now']) }}</a>
                                </h2>
                            @endif
                            {{-- @foreach ($Subscriptions as $Subscription)
                            <div class="col-md-4 col-sm-6">
                                <div class="pricing-table-3 premium">
                                    <div class="pricing-table-header">
                                        <h4><strong>PREMIUM</strong></h4>
                                        <p>{{ $subscriptions->name }}</p>
                                    </div>
                                    <div class="price"><strong>3</strong> / MONTH</div>
                                    <div class="pricing-body">
                                        <ul class="pricing-table-ul">
                                            <li><i class="fa fa-send"></i> Unlimited Resumes</li>
                                            <li><i class="fa fa-cloud"></i>More Space</li>
                                            <li class="not-avail"><i class="fa fa-clock-o"></i> 24X7 Support</li>
                                            <li class="not-avail"><i class="fa fa-envelope"></i> Email Support</li>
                                        </ul><a href="#" class="view-more">Cancel Plan</a>
                                    </div>
                                </div>
                            </div>
                            @endforeach --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
