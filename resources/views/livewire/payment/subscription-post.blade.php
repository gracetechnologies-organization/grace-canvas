<div>
    <div class="container mt-5 mb-5">
        @if (session()->has('massage'))
            <div class="alert alert-denger alert-dismissible fade show" role="alert">
                <strong>{{ session()->get('massage') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="row ">
            <div class="float-left col-6 buy-now-premium-template standard-heading-subscription">
                <h2>Buy Now Our Premium Plan</h2>
                <h3>Name : {{ auth()->user()->name }}</h3>
                <h3>Email : {{ auth()->user()->email }}</h3>
                <h3>Plan : {{ $Plan->name }}</h3>
                <h3>Price : ${{ number_format($Plan->cost, 2) }}</h3>
            </div>
            <div class="float-right col-6 ">
                <div class="col-lg-12 col-md-6 ">

                    <div class="card h-80">
                        <div class="card-header">
                            Pay with debits or credits
                        </div>
                        <div class="card-body">
                            <form id="payment-form" {{--  wire:submit.prevent='subscriptionPost'>  --}} action="{{ route('subscription.create') }}"
                                method="POST">
                                @csrf
                                <input type="hidden" name="plan" id="plan" value="{{ $Plan->stripe_plan }}">
                                <input type="hidden" name="month" id="month" value="{{ $Plan->interval_count }}">
                                <input type="hidden" name="name" id="name" value="{{ $Plan->name }}">
                                <div class="row">
                                    <div class="mt-3">
                                        <div class="form-group">
                                            <label for="" class="mb-2">Name</label>
                                            <input type="text" name="name" id="card-holder-name"
                                                class="form-control" value="{{ auth()->user()->name }}"
                                                placeholder="Name on the card">
                                        </div>
                                    </div>
                                </div>
                                <d iv class="row">
                                    <div class="mt-3 ">
                                        <div class="form-group">
                                            <label for="" class="mb-2">Card details</label>
                                            <div id="card-element"></div>
                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-lg-12">
                                        <hr>
                                        <button type="submit" class="btn btn-success" id="card-button"
                                            data-secret="{{ $intent->client_secret }}">Buy Now</button>
                                    </div>
                        </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        .card-header {
            background-color: var(--custom-theme-color);
            color: #ffffff;
        }

        .buy-now-premium-template {
            border: 2px dashed var(--custom-theme-color);
        }
    </style>
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
