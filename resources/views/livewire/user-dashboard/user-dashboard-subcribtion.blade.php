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
                                        <th scope="col">{{ app('googleTranslator', ['string' =>  strtoupper('plan name')]) }}</th>
                                        <th scope="col">{{ app('googleTranslator', ['string' =>  strtoupper('price')]) }}</th>
                                        <th scope="col">{{ app('googleTranslator', ['string' =>  strtoupper('quantity')]) }}</th>
                                        <th scope="col">{{ app('googleTranslator', ['string' =>  strtoupper('trail-at-end')]) }}</th>
                                        <th scope="col">{{ app('googleTranslator', ['string' =>  strtoupper('end-at')]) }}</th>
                                        <th scope="col">{{ app('googleTranslator', ['string' =>  strtoupper('status')]) }}</th>
                                        <th scope="col">{{ app('googleTranslator', ['string' =>  strtoupper('action')]) }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($Subscriptions as $Subscription)
                                    <tr>
                                        <th scope="row">
                                            @if ($Subscription->plan)
                                            {{ $Subscription->plan->name }}
                                            @else
                                            Null
                                            @endif
                                        </th>
                                        <td>
                                            @if ($Subscription->plan)
                                            ${{ $Subscription->plan->price }}
                                            @else
                                            Null
                                            @endif
                                        </td>
                                        <td>{{ $Subscription->quantity }}</td>
                                        <td>
                                            @if ($Subscription->trial_ends_at == null)
                                            Null
                                            @else
                                            {{ $Subscription->trial_ends_at }}
                                            @endif
                                        </td>
                                        <td>
                                            @if ($Subscription->ends_at == null)
                                            Null
                                            @else
                                            {{ $Subscription->ends_at }}
                                            @endif
                                        </td>
                                        <td>
                                            {{ $Subscription->stripe_status }}
                                        </td>
                                        <td>
                                            @if ($Subscription->ends_at == null)
                                                {{--  @php
                                                $trialEndDate = $Subscription->created_at;
                                                $currentDate = now();
                                                $daysDifference = $currentDate->diffInDays($trialEndDate);
                                                @endphp
                                                @if ($daysDifference < 5)  --}}
                                                    <a href="#" wire:click="cancel({{ $Subscription->id }})">
                                                    <i class="bi bi-x-square-fill"></i>
                                                    </a>
                                                {{--  @endif  --}}
                                            @endif
                                                @if ($Subscription->stripe_status == 'canceled')
                                                    <a href="#" wire:click="delete({{ $Subscription->id }})">
                                                    <i class='bx bxs-trash'></i>
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
