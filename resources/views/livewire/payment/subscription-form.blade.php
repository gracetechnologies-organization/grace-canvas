<div>
    <div class="container mt-5 mb-5">
        @if (session()->has('subscription_success'))
            <div class="modal fade show" id="subscription-success-modal" tabindex="-1" aria-labelledby="customModalLabel" aria-hidden="true" style="display: block;">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body">
                            <!-- Your custom message goes here -->
                            {{ session('subscription_success') }}
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-warning" data-bs-dismiss="modal">OK</button>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        @if (session()->has('subscription_error'))
            <div class="modal fade show " id="subscription-error-modal" tabindex="-1" aria-labelledby="customModalLabel" aria-hidden="true" style="display: block;">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body">
                            <!-- Your custom message goes here -->
                            {{ session('subscription_error') }}
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-warning" data-bs-dismiss="modal">OK</button>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        <div class="p-2 row">
            <div class="float-left mt-5 col-lg-6 col-md-6 col-sm-12 buy-now-premium-template standard-heading-subscription">
                <h2>{{ app('googleTranslator', ['string' => 'Buy Now Our Premium Plan']) }}</h2>
                <h3>{{ app('googleTranslator', ['string' => 'Name']) }}: {{ app('googleTranslator', ['string' => auth()->user()->name]) }} </h3>
                <h3>{{ app('googleTranslator', ['string' => 'Email']) }} :{{ app('googleTranslator', ['string' => auth()->user()->email]) }}</h3>
                <h3>{{ app('googleTranslator', ['string' => 'Plan']) }} :{{ app('googleTranslator', ['string' => $Plan->name]) }}</h3>
                <h3>{{ app('googleTranslator', ['string' => 'Price']) }} : ${{ app('googleTranslator', ['string' => number_format($Plan->price, 2)]) }} </h3>
            </div>
            <div class="float-right mt-5 col-lg-6 col-md-6 col-sm-12">
                <div class="col-lg-12 ">
                    <div class="card h-80">
                        <div class="card-header">
                            {{ app('googleTranslator', ['string' => ' Pay with debits or credits']) }}
                        </div>
                        <div class="card-body">
                            <form id="payment-form" action="{{ route('subscription.create') }}" method="POST">
                                @csrf
                                <input type="hidden" name="plan" id="plan" value="{{ $Plan->stripe_plan }}">
                                <input type="hidden" name="month" id="month" value="{{ $Plan->interval_count }}">
                                <input type="hidden" name="name" id="name" value="{{ $Plan->name }}">
                                <div class="row">
                                    <div class="mt-3">
                                        <div class="form-group">
                                            <label for="" class="mb-2">{{ app('googleTranslator', ['string' => 'Name']) }}</label>
                                            <input type="text" name="name" id="card-holder-name" class="form-control" value="{{ auth()->user()->name }}" placeholder="Name on the card">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mt-3">
                                        <div class="form-group">
                                            <label for="" class="mb-2">{{ app('googleTranslator', ['string' => 'Card Details']) }}</label>
                                            <div id="card-element"></div>
                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-lg-12">
                                        <hr>
                                        <button type="submit" class="btn btn-success" id="card-button" data-secret="{{ $intent->client_secret }}">
                                            {{ app('googleTranslator', ['string' => 'Buy Now']) }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://js.stripe.com/v3/"></script>
    <script>
        const stripe = Stripe(
            'pk_test_51Nng5dAJ0BhvCZp9see6kAuu4KXv55iJhglclV7ygV3D6SM2xP1c8arWtvleTlke54oOp7elBry11TixVhcTf9Ve00gqlNypqH'
        )

        const elements = stripe.elements()
        const cardElement = elements.create('card')

        cardElement.mount('#card-element')

        const form = document.getElementById('payment-form')
        const cardBtn = document.getElementById('card-button')
        const cardHolderName = document.getElementById('card-holder-name')

        form.addEventListener('submit', async (e) => {
            e.preventDefault()

            cardBtn.disabled = true
            const {
                setupIntent,
                error
            } = await stripe.confirmCardSetup(
                cardBtn.dataset.secret, {
                    payment_method: {
                        card: cardElement,
                        billing_details: {
                            name: cardHolderName.value
                        }
                    }
                }
            )

            if (error) {
                cardBtn.disable = false
            } else {
                let token = document.createElement('input')
                token.setAttribute('type', 'hidden')
                token.setAttribute('name', 'token')
                token.setAttribute('value', setupIntent.payment_method)
                form.appendChild(token)
                form.submit();
            }
        })
    </script>
</div>

