<div>
    <div class="demo">
        <div class="container mt-5 mb-5">
            @if (session('subscription_message'))
                <div class="modal fade show madel" id="subscription-message-modal" tabindex="-1" aria-labelledby="customModalLabel" aria-hidden="true" style="display: block;">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-body">
                                <!-- Your custom message goes here -->
                                {{ session('subscription_message') }}
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-warning" data-bs-dismiss="modal">OK</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            @if (session()->has('subscription_success'))
                <div class="modal fade show madel" id="subscription-success-modal" tabindex="-1" aria-labelledby="customModalLabel" aria-hidden="true" style="display: block;">
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
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>{{ session()->get('subscription_error') }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            @endif
            <div class="row">
                @forelse ($Plans as $Plan)
                    <div class="col-md-4 col-sm-6">
                        <div class="pricingTable pink">
                            <h3 class="title">{{ $Plan->name }}</h3>
                            <div class="price-value">
                                <span class="currency">$</span>
                                <span class="amount">{{ $Plan->price }}</span>
                                <span class="month">{{ $Plan->interval_count }}/month</span>
                            </div>
                            <ul class="pricing-content">

                                <li><span class="bx bx-check me-2"></span>All Premium templates</li>
                                <li><span class="bx bx-check me-2"></span>24/7 support</li>
                            </ul>
                            <a href="{{ route('subscription.form', ['ID' => $Plan->id, 'month' => $Plan->interval_count]) }}" class="pricingTable-signup">
                                BUY NOW
                            </a>
                        </div>
                    </div>
                @empty
                    <h1 class="text-center"> No Plans Created Yet..!! </h1>
                @endforelse
            </div>
        </div>
    </div>
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
    {{-- <script>
        $(document).ready(function() {
            @if (session('subscription_message'))
                // Open the modal when the page is reloaded
                $('#subscription-message-modal').modal('show');
            @endif
            @if (session('subscription_success'))
                $('#subscription-success-modal').modal('show');
            @endif
        });
    </script> --}}
</div>
