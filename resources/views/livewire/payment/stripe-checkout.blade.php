<div>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-10">
                <div class="col-6 float-start order-end">
                    <h3>Your Personel Details</h3>
                    <h5> Name : {{ $User->name }}</h5>
                    <h5> Email :  {{ $User->email }}</h5>
                    <h5> Card : {{ $User->pm_type }}</h5>
                </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 float-end">
                        @if (session()->has('success'))
                            <div class="alert alert-success">
                                {{ session()->get('success') }}
                            </div>
                        @endif
                        <div class="card">
                            <form action="{{ route('stripe.card.submit') }}" method="post" id="payment-form">
                                @csrf
                                <div class="form-group">
                                    <div class="card-header">
                                        <label for="card-element">
                                           <strong> Enter your credit card information </strong>
                                            <span class="card-icons">
                                                <i class="fa-brands fa-cc-visa fa-2xl" style="color: #3d4fd6;"></i>
                                                <i class="fa-brands fa-cc-mastercard fa-2xl" style="color: #f00000;"></i>
                                                <!-- Add icons for other card types as needed -->
                                            </span>
                                        </label>
                                    </div>
                                    <div class="card-body">
                                        <div id="card-element">
                                            <!-- A Stripe Element will be inserted here. -->
                                        </div>
                                        <!-- Used to display form errors. -->
                                        <div id="card-errors" role="alert"></div>
                                        <input type="hidden" name="Price" value="{{ $Price }}" />
                                    </div>

                                </div>
                                <div class="card-footer">
                                    <button class="btn btn-dark" type="submit">Buy ${{ $Price }}</button>
                                </div>
                            </form>
                        </div>
                    </div>
            </div>

        </div>
    </div>

    @section('scripts')
        <script src="https://js.stripe.com/v3/"></script>
        <script>
            // Create a Stripe client.
            {{--  var stripe = Stripe('{{ env('STRIPE_KEY') }}');  --}}
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
            // Create an instance of the card Element.
            var card = elements.create('card', {
                style: style
            });
            // Add an instance of the card Element into the `card-element` <div>.
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
            form.addEventListener('submit', function(event) {
                event.preventDefault();

                stripe.createToken(card).then(function(result) {
                    if (result.error) {
                        // Inform the user if there was an error.
                        var errorElement = document.getElementById('card-errors');
                        errorElement.textContent = result.error.message;
                    } else {
                        // Send the token to your server.
                        stripeTokenHandler(result.token);
                    }
                });
            });
            // Submit the form with the token ID.
            function stripeTokenHandler(token) {
                // Insert the token ID into the form so it gets submitted to the server

                var form = document.getElementById('payment-form');
                var hiddenInput = document.createElement('input');
                hiddenInput.setAttribute('type', 'hidden');
                hiddenInput.setAttribute('name', 'stripeToken');
                hiddenInput.setAttribute('value', token.id);
                form.appendChild(hiddenInput);
                // Submit the form
                form.submit();
            }
        </script>
    </div>
