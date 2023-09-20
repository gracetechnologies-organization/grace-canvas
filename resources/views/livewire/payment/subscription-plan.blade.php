<div>
    <div class="demo">
        <div class="container">
            <div class="col-lg-4 col-md-6 col-sm-12">
                @if (session()->has('success'))
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>{{ session()->get('success') }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if (session()->has('massage'))
                    <div class="alert alert-denger alert-dismissible fade show" role="alert">
                        <strong>{{ session()->get('massage') }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
            </div>
            <div class="row">
                <div class="col-md-4 col-sm-6">
                    <div class="pricingTable pink">
                        <h3 class="title">Free Templates </h3>
                        <div class="price-value">
                            <span class="currency">$</span>
                            <span class="amount">0.00</span>
                            <span class="month">/month</span>
                        </div>
                        <ul class="pricing-content">
                            <li><span class="bx bx-check me-2"></span>You Are Using Just 10 Template</li>
                            <li><span class=" me-2"></span>Bathroom cleaning</li>
                            <li><span class=" me-2"></span>Mirrow cleaning</li>
                            <li><span class=" me-2"></span>Livingroom cleaning</li>
                        </ul>
                        <a href="{{ route('templates.resume') }}" class="pricingTable-signup">Go To Free</a>
                    </div>
                </div>
                @forelse ($Plans as $Plan)
                <div class="col-md-4 col-sm-6">
                    <div class="pricingTable pink">
                        <h3 class="title">{{ $Plan->name }}</h3>
                        <div class="price-value">
                            <span class="currency">$</span>
                            <span class="amount">{{ $Plan->price }}</span>
                            <span class="month">/month</span>
                        </div>
                        <ul class="pricing-content">
                        @if($Plan->price == 10)
                        <li><span class="bx bx-check me-2"></span>You Are Using Just 50 Template</li>
                        <li><span class="bx bx-check me-2"></span>Bathroom cleaning</li>
                        <li><span class=" me-2"></span>Mirrow cleaning</li>
                        <li><span class=" me-2"></span>Livingroom cleaning</li>
                        @elseif ($Plan->price == 15)
                            <li><span class="bx bx-check me-2"></span>You Are Using Just 100 Template</li>
                            <li><span class="bx bx-check me-2"></span>Bathroom cleaning</li>
                            <li><span class="bx bx-check me-2"></span>Mirrow cleaning</li>
                            <li><span class="bx bx-check me-2"></span>Livingroom cleaning</li>
                        @endif

                        </ul>
                        <a href="{{ route('subscription.post', ['ID' => $Plan->id]) }}" class="pricingTable-signup">BUY NOW</a>
                    </div>
                </div>
                @empty
                <div class="col-md-4 col-sm-6">
                    <div class="pricingTable">
                        <h3 class="title"></h3>
                        <div class="price-value">
                            <span class="currency">$</span>
                            <span class="amount">10.00</span>
                            <span class="month">/month</span>
                        </div>
                        <ul class="pricing-content">

                            <li><b>50GB</b> Disk Space</li>
                            <li><b>50</b> Email Accounts</li>
                            <li><b>50GB</b> Bandwidth</li>
                            <li><b>10</b> Subdomains</li>
                            <li><b>15</b> Domains</li>
                        </ul>
                        <a href="#" class="pricingTable-signup">Order Now</a>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="pricingTable pink">
                        <h3 class="title">BUSINESS</h3>
                        <div class="price-value">
                            <span class="currency">$</span>
                            <span class="amount">20.00</span>
                            <span class="month">/month</span>
                        </div>
                        <ul class="pricing-content">
                            <li><b>60GB</b> Disk Space</li>
                            <li><b>60</b> Email Accounts</li>
                            <li><b>60GB</b> Bandwidth</li>
                            <li><b>15</b> Subdomains</li>
                            <li><b>20</b> Domains</li>
                        </ul>
                        <a href="#" class="pricingTable-signup">Order Now</a>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="pricingTable blue">
                        <h3 class="title">PREMIUM</h3>
                        <div class="price-value">
                            <span class="currency">$</span>
                            <span class="amount">30.00</span>
                            <span class="month">/month</span>
                        </div>
                        <ul class="pricing-content">
                            <li><b>70GB</b> Disk Space</li>
                            <li><b>70</b> Email Accounts</li>
                            <li><b>70GB</b> Bandwidth</li>
                            <li><b>20</b> Subdomains</li>
                            <li><b>25</b> Domains</li>
                        </ul>
                        <a href="#" class="pricingTable-signup">Order Now</a>
                    </div>
                </div>
                @endforelse
            </div>
        </div>
    </div>
    <style>
        .demo {
            background: #FAD2C8;
            padding: 30px 0
        }

        a {
            text-decoration: none;
        }

        .pricingTable {
            padding: 25px 10px 70px;
            margin: 0 15px;
            text-align: center;
            z-index: 1;
            position: relative
        }

        .pricingTable:after,
        .pricingTable:before {
            content: "";
            position: absolute;
            left: 0
        }

        .pricingTable .price-value .amount {
            display: inline-block;
            font-size: 50px;
            font-weight: 700
        }

        .pricingTable .price-value .month {
            display: block;
            font-size: 20px;
            font-weight: 500;
            line-height: 10px;
            text-transform: uppercase
        }

        .pricingTable:before {
            width: 100%;
            height: 100%;
            background: #fff;
            top: 0;
            z-index: -1;
            -webkit-clip-path: polygon(100% 0, 100% 85%, 50% 100%, 0 85%, 0 0);
            clip-path: polygon(100% 0, 100% 85%, 50% 100%, 0 85%, 0 0)
        }

        .pricingTable:after {
            width: 70px;
            height: 30px;
            background: #1daa72;
            margin: 0 auto;
            top: 70px;
            right: 0;
            -webkit-clip-path: polygon(50% 100%, 0 0, 100% 0);
            clip-path: polygon(50% 100%, 0 0, 100% 0)
        }

        .pricingTable .title {
            padding: 15px 0;
            margin: 0 -25px 30px;
            background: #1daa72;
            font-size: 25px;
            font-weight: 600;
            color: #fff;
            text-transform: uppercase;
            position: relative
        }

        .pricingTable .title:after,
        .pricingTable .title:before {
            border-top: 15px solid #51836d;
            border-bottom: 15px solid transparent;
            position: absolute;
            bottom: -30px;
            content: ""
        }

        .pricingTable .title:before {
            border-left: 15px solid transparent;
            left: 0
        }

        .pricingTable .title:after {
            border-right: 15px solid transparent;
            right: 0
        }

        .pricingTable .price-value {
            margin-bottom: 25px;
            color: #1daa72
        }

        .pricingTable .currency {
            display: inline-block;
            font-size: 30px;
            vertical-align: top;
            margin-top: 8px
        }

        .price-value .amount {
            display: inline-block;
            font-size: 50px;
            font-weight: 700
        }

        .price-value .month {
            display: block;
            font-size: 20px;
            font-weight: 500;
            line-height: 10px;
            text-transform: uppercase
        }

        .pricingTable .pricing-content {
            padding: 0;
            margin: 0 0 25px;
            list-style: none;
            border-top: 1px solid #8f8f8f;
            border-bottom: 1px solid #8f8f8f
        }

        .pricingTable .pricing-content li {
            font-size: 17px;
            color: #8f8f8f;
            line-height: 55px
        }

        .pricingTable .pricingTable-signup {
            display: inline-block;
            padding: 10px 30px;
            background: #1daa72;
            font-size: 18px;
            font-weight: 600;
            color: #fff;
            overflow: hidden;
            position: relative;
            transition: all .7s ease 0s
        }

        .pricingTable .pricingTable-signup:before {
            content: "";
            display: inline-block;
            width: 100%;
            height: 100%;
            background: linear-gradient(to bottom, rgba(255, 255, 255, 0) 0, rgba(255, 255, 255, 1) 50%, rgba(255, 255, 255, 0) 100%);
            position: absolute;
            top: 0;
            left: 0;
            opacity: 0;
            transform: translate(0, 100%);
            transition: all .6s ease-in-out 0s
        }

        .pricingTable .pricingTable-signup:hover:before {
            opacity: 1;
            transform: translate(0, -100%)
        }

        .pricingTable.blue .pricingTable-signup,
        .pricingTable.blue .title,
        .pricingTable.blue:after {
            background: #49b0ca
        }

        .pricingTable.blue .title:after,
        .pricingTable.blue .title:before {
            border-top: 15px solid #407a88
        }

        .pricingTable.blue .price-value {
            color: #49b0ca
        }

        .pricingTable.pink .pricingTable-signup,
        .pricingTable.pink .title,
        .pricingTable.pink:after {
            background: #ff6600
        }

        .pricingTable.pink .price-value {
            color: #ff6600
        }

        .pricingTable.pink .title:after,
        .pricingTable.pink .title:before {
            border-top: 15px solid #773667
        }

        @media only screen and (max-width:990px) {
            .pricingTable {
                margin-bottom: 30px
            }
        }
    </style>
    {{--  <div class="container mb-5 mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 col-sm-12">
                @if (session()->has('success'))
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>{{ session()->get('success') }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if (session()->has('masssage'))
                    <div class="alert alert-denger alert-dismissible fade show" role="alert">
                        <strong>{{ session()->get('massage') }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
            </div>
        </div>
        <div class="row justify-content-center">
            @forelse ($Plans as $Plan)
                <div class="col-lg-3 col-md-6 ">
                    <div class="card d-flex align-items-center justify-content-center">

                        <div class="ribon">
                            <span class="bx bxs-spray-can"> ${{ $Plan->cost }}</span>
                        </div>
                        <p class="h-1 pt-5"></p> <span class="price"><span class="number">{{ $Plan->name }}</span>
                        </span>
                        <ul class="mb-5 list-unstyled text-muted">
                            @if ($Plan->cost == 0)
                                <li><span class="bx bx-check me-2"></span>Vacuuming</li>
                            @elseif($Plan->cost == 10)
                                <li><span class="bx bx-check me-2"></span>Vacuuming</li>
                                <li><span class="bx bx-check me-2"></span>Bathroom cleaning</li>
                            @elseif ($Plan->cost == 15)
                                <li><span class="bx bx-check me-2"></span>Vacuuming</li>
                                <li><span class="bx bx-check me-2"></span>Bathroom cleaning</li>
                                <li><span class="bx bx-check me-2"></span>Mirrow cleaning</li>
                                <li><span class="bx bx-check me-2"></span>Livingroom cleaning</li>
                            @endif
                        </ul>
                        <a href="{{ route('subscription.post', ['ID' => $Plan->id]) }}" class="btn btn-primary"
                            type="submit" value="30">Buy </a>

                    </div>
                </div>
            @empty
                <div class="col-lg-3 col-md-6 ">
                    <div class="card d-flex align-items-center justify-content-center">

                        <div class="ribon">
                            <span class="bx bxs-spray-can"></span>
                        </div>
                        <p class="h-1 pt-5"></p> <span class="price"><span class="number">Premuim</span> </span>
                        <ul class="mb-5 list-unstyled text-muted">
                            <li><span class="bx bx-check me-2"></span>Vacuuming</li>
                            <li><span class="bx bx-check me-2"></span>Bathroom cleaning</li>
                            <li><span class="bx bx-check me-2"></span>Mirrow cleaning</li>
                            <li><span class="bx bx-check me-2"></span>Livingroom cleaning</li>

                            <select name="plan" id="">
                                <option value="yhjhjhj5" selected>1 Month</option>
                                <option value="price_1NrZ7kAJ0BhvCZp9ymmyMAUn">Standerd $10 / One Month</option>
                                <option value="price_1NrZ7kAJ0BhvCZp95weXZO6U">Standerd $15 / Six Month</option>
                            </select>
                        </ul>
                        <a href="#" class="btn btn-primary" type="submit" value="30">Buy </a>

                    </div>
                </div>
            @endforelse



        </div>
    </div>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');

        .card {
            max-width: 250px;
            height: 380px;
            position: relative;
            padding: 20px;
            box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
            color: black;
        }

        .h-1 {
            text-transform: uppercase
        }

        .ribon {
            position: absolute;
            left: 50%;
            top: 0;
            transform: translate(-50%, -50%);
            width: 80px;
            height: 80px;
            background-color: #2b98f0;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center
        }

        .ribon .fas.fa-spray-can,
        .ribon .fas.fa-broom,
        .ribon .fas.fa-shower,
        .ribon .fas.fa-infinity {
            font-size: 30px;
            color: rgb(255, 255, 255)
        }

        .card .price {
            color: #2b98f0;
            font-size: 30px
        }

        .card ul {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center
        }

        .card ul li {
            font-size: 12px;
            margin-bottom: 8px
        }

        .card ul .fa.fa-check {
            font-size: 8px;
            color: gold
        }

        .card:hover {
            background-color: #f0975b
        }

        .card:hover .fa.fa-check {
            color: #2b98f0
        }

        .card .btn {
            width: 200px;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #2b98f0;
            border: none;
            border-radius: 0px;
            box-shadow: none
        }

        @media (max-width:500px) {
            .card {
                max-width: 100%
            }
        }
    </style>  --}}
    {{--  <script src="https://js.stripe.com/v3/"></script>
    <script>
        // Create a Stripe client.
        var stripe = Stripe(
            'pk_test_51Nng5dAJ0BhvCZp9see6kAuu4KXv55iJhglclV7ygV3D6SM2xP1c8arWtvleTlke54oOp7elBry11TixVhcTf9Ve00gqlNypqH'
        );

        // Create an instance of Elements.
        var elements = stripe.elements();

        // Custom styling can be passed to options when creating an Element.
        // (Note that this demo uses a wider set of styles than the guide below.)
        var style = {
            base: {
                color: '#32325d',
                lineHeight: '18px',
                fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                fontSmoothing: 'antialiased',
                fontSize: '16px',
                '::placeholder': {
                    color: '#aab7c4'
                }
            },
            invalid: {
                color: '#fa755a',
                iconColor: '#fa755a'
            }
        };
        // Create an instance of the card Elment.
        var card = elements.create('card', { style: style });

        // Add a instance of the card Element into the `card-element` <div>.

        card.mount('#card-element');

        // Handle real-time validation errors from the card Element.

        card.addEventListener('change', function(event) {
            var displayError = document.getElementById('card-errors');
            if (event.error) {
                displayError.textContent = event.error.message;
            } else {
                displayError.textContent = '';
            }
        });

        // Handle form submission.
        var form = document.getElementById('payment-form');
        var cardHolderName = document.getElementById('cardHolder-name');
        const clientSecret = form.dataset.secret;

        form.addEventListener('submit', async function(event) {
            event.preventDefault();

            const {
                setupIntent,
                error
            } = await stripe.confirmCardSetup(
                clientSecret, {
                    payment_method: {
                        card:card,
                        billing_details: {
                            name: cardHolderName.value
                        }
                    }
                }
            );

            if (error) {
                // Inform the user if there was an error.
                var errorElement = document.getElementById('card-errors');
                errorElement.textContent =error.message;
            } else {
              // Send the token to your server.
              //console.log(setupIntent);
               stripeTokenHandler(setupIntent);

            }
            // stripe.createToken(card).then(function(result) {
            // if (result.error) {

            // // Inform the user if there was an error.
            //    var errorElement = document.getElementById('card-errors');
            //   errorElement.textContent = result.error.message;
            // } else {
            // // Send the token to your server.

            //  stripeTokenHandler(result.token);
            // }
            //});
        });

        // Submit the form with the token ID.
        function stripeTokenHandler(setupIntent) {
            // Insert the token ID into the form so it gets submitted to the server

            var form = document.getElementById('payment-form');
            var hiddenInput = document.createElement('input');
            hiddenInput.setAttribute('type', 'hidden');
            hiddenInput.setAttribute('name', 'paymentMethod');
            hiddenInput.setAttribute('value', setupIntent.payment_method);
            form.appendChild(hiddenInput);
            // Submit the form
            form.submit();
        }
    </script>  --}}
</div>
