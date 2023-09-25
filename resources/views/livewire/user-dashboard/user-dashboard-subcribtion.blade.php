<div>
    <div class="container custom-user-dashboard-container">
        @include('components.user-dashboard-heading')
        <div class="row">
            <!-- Add Bootstrap classes for responsive design -->
            <div class="col-lg-3 col-md-3 col-sm-6">
                @include('components.user-dashboard-sidebar')
            </div>
            <div class="col-lg-9 col-md-9 col-sm-6">

                <div class="col-lg-12 col-md-12 col-sm-12">
                </div>
                <div class="content">
                    <div id="dataContainer">
                        <div class="row">
                            @if (session('subscription_message'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong>{{ session('subscription_message') }}</strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif
                            @if ($cancelSuccessMessage)
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>{{ $cancelSuccessMessage }}</strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif
                            @if (session()->has('massage'))
                                <div class="alert alert-denger alert-dismissible fade show" role="alert">
                                    <strong>{{ session()->get('massage') }}</strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif
                            @if (count($Subscriptions) > 0)
                                {{--  @dd($User)  --}}
                                <table class="table custome-card-border">
                                    <thead>
                                        <tr>
                                            <th scope="col">{{ strtoupper('plan name') }}</th>
                                            <th scope="col">{{ strtoupper('price') }}</th>
                                            <th scope="col">{{ strtoupper('quantity') }}</th>
                                            <th scope="col">{{ strtoupper('trail_at_end') }}</th>
                                            <th scope="col">{{ strtoupper('end_at') }}</th>
                                            <th scope="col">{{ strtoupper('action') }}</th>
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
                                                {{--  this method use for all plan cancel  --}}
                                                {{--  <td>
                                                    <a href="#" wire:click="cancel">cancelPlan</a>
                                                 </td>  --}}
                                                {{--  this method use for only used for id based plan cancel  --}}
                                                <td>
                                                    @if ($Subscription->ends_at == null)
                                                        <a href="#"
                                                            wire:click="cancel({{ $Subscription->id }})"><i
                                                                class="bi bi-x-square-fill"></i></a>
                                                    @else
                                                        <span class="text-muted">Plan Canceled</span>
                                                    @endif
                                                </td>

                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @else
                                <h2>{{ strtoupper('your are not subscripe to any plan ') }}<a
                                        href="{{ route('subscription') }}">subscribe
                                        new plan</a></h2>
                            @endif
                            {{--  @foreach ($Subscriptions as $Subscription)
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
                            @endforeach  --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
