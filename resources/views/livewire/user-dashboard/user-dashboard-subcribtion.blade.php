<div>
    @extends('livewire.user-dashboard.user-dashboard')
    @section('user-dashboard')
        <div class="row">
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
                                    {{--  {{ $Subscription->plan->name}}  --}}
                                </th>
                                <td>
                                    @if ($Subscription->plan)
                                        ${{ $Subscription->plan->price }}
                                    @else
                                        Null
                                    @endif
                                    {{--  @if ($Subscription->stripe_price == 'price_1NrZ7kAJ0BhvCZp9ymmyMAUn')
                                        $10
                                    @elseif ($Subscription->stripe_price == 'price_1NrZ7kAJ0BhvCZp95weXZO6U')
                                        $15
                                    @endif  --}}
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
                                <td><a href="">cancelPlan</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <h2>{{ strtoupper('your are not subscripe to any plan ') }}<a href="{{ route('subscription') }}">subscribe
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
    @endsection
    <style>
        @charset "utf-8";
        /* CSS Document */
        @import url(http://fonts.googleapis.com/css?family=Open+Sans:300italic,500,400,300,800);
        @import url(http://fonts.googleapis.com/css?family=Ubuntu:300,400,700);
        @import url(http://fonts.googleapis.com/css?family=Roboto:100,300,400);



        h3 {
            font-size: 22px;
        }

        .container-fluid,
        .container {
            margin: auto;
            padding: 0px 15px;
            max-width: 1200px;
        }

        label {
            font-weight: 500;
        }

        .form-group {
            margin-bottom: 5px;
        }


        input,
        textarea,
        select,
        button {
            margin: 5px 0px;
            font-size: 13px !important;
            border-radius: 0px;
        }

        input[type=text],
        input[type=password],
        textarea,
        input[type=email],
        select,
        textarea {
            width: 100%;
            border: 1px solid #DADADA;
            padding: 5px 10px;
            height: 45px;
        }

        input[type=submit],
        input[type=button],
        input[type=reset],
        button {
            border: none;
            font-size: 11px;
            border-radius: 3px;
            height: 45px;
            color: #FFF;
        }

        .btn:hover,
        .btn:focus {
            cursor: pointer;
            color: #FFF;
        }

        input[type=radio] {
            margin: 0px;
            padding: 0px;
            height: auto;
        }

        .form-control {
            box-shadow: none !important;
            border-radius: 0px;
        }

        .form-control:focus {
            border: 1px solid #CCC;
        }

        .btn:focus {
            box-shadow: none !important;
        }

        textarea {
            width: 100%;
        }

        input[type=reset] {
            margin-left: 10px;
        }

        textarea {
            min-height: 100px;
        }

        a {
            color: inherit;
        }

        a:hover,
        a:focus {
            text-decoration: none !important;
            color: inherit !important;
        }

        ul {
            margin: 0px;
            padding: 0px;
            list-style: none;
        }

        .relative {
            position: relative;
        }

        .absolute {
            position: absolute;
        }

        .fixed {
            position: fixed;
        }

        .pricing-table-container {
            padding: 50px 0px;
        }

        .description {
            padding: 15px 0px;
        }

        .description a {
            padding: 10px;
            font-size: 13px;
            display: block;
            font-weight: bold;
            border-bottom: 1px solid #DDD;
        }

        .description a.active {
            background-color: #FFF;
            padding-left: 25px;
        }

        @charset "utf-8";

        /* DEMO 01 */
        .pricing-table-3 {
            background-color: #FFF;
            margin: 15px auto;
            box-shadow: 0px 0px 25px rgba(0, 0, 0, 0.1);
            max-width: 300px;
            border-radius: 0px 10px 0px 10px;
            overflow: hidden;
            position: relative;
            min-height: 250px;
            transition: all ease-in-out 0.25s;
        }

        .pricing-table-3:hover {
            transform: scale(1.1, 1.1);
            cursor: pointer;
        }

        .pricing-table-3.basic .price {
            background-color: #28b6f6;
            color: #FFF;
        }

        .pricing-table-3.premium .price {
            background-color: #ff9f00;
            color: #FFF;
        }

        .pricing-table-3.business .price {
            background-color: #c3185c;
            color: #FFF;
        }

        .pricing-table-3 .pricing-table-header {
            color: #FFF;
            padding: 20px 0px 0px 20px;
            position: absolute;
            z-index: 5;
        }

        .pricing-table-3 .pricing-table-header p {
            margin-top: 1rem;
            font-size: 12px;
            opacity: 0.9;
        }

        .pricing-table-3 .pricing-table-header::before {
            content: "";
            position: absolute;
            left: -50px;
            right: -180px;
            height: 125px;
            top: -50px;
            background-color: #212121;
            z-index: -1;
            transform: rotate(-20deg)
        }

        .pricing-table-3 .price {
            position: absolute;
            top: 0px;
            text-align: right;
            padding: 110px 20px 0px 0px;
            right: 0px;
            left: 0px;
            font-size: 20px;
            z-index: 4;
        }

        .pricing-table-3 .price::before {
            content: "";
            position: absolute;
            left: 0px;
            right: 0px;
            height: 100px;
            bottom: -25px;
            background-color: inherit;
            transform: skewY(10deg);
            z-index: -1;
            box-shadow: 0px 5px 0px 5px rgba(0, 0, 0, 0.05);
        }


        .pricing-table-3 .pricing-body {
            padding: 20px;
            padding-top: 200px;
        }

        .pricing-table-3 .pricing-table-ul li {
            color: rgba(0, 0, 0, 0.7);
            font-size: 13px;
            padding: 10px;
            border-bottom: 1px solid rgba(0, 0, 0, 0.1);
        }

        .pricing-table-3 .pricing-table-ul .fa {
            margin-right: 10px;
        }

        .pricing-table-3.basic .pricing-table-ul .fa {
            color: #28b6f6;
        }

        .pricing-table-3.premium .pricing-table-ul .fa {
            color: #ff9f00;
        }

        .pricing-table-3.business .pricing-table-ul .fa {
            color: #c3185c;
        }

        .pricing-table-3 .view-more {
            margin: 10px 20px;
            display: block;
            text-align: center;
            background-color: #212121;
            padding: 10px 0px;
            color: #FFF;
        }
    </style>
</div>
