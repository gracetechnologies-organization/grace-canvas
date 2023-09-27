<div>
    <div class="demo">
        <div class="container mt-5 mb-5">

            {{--  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#customModal">
                Open Custom SweetAlert
            </button>  --}}

            <!-- The Modal -->
            {{--  @if (session('subscription_message'))
                <div class="modal fade" id="customModal" tabindex="-1" aria-labelledby="customModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="customModalLabel">Custom SweetAlert</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <!-- Your custom message goes here -->
                                {{ session('subscription_message') }}
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <!-- You can add additional buttons here -->
                                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">OK</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endif  --}}
            @if (session('subscription_message'))
                <div class="modal fade show madel" id="customModal" tabindex="-1" aria-labelledby="customModalLabel" aria-hidden="true" style="display: block;">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            {{--  <div class="modal-header">
                                <h5 class="modal-title" id="customModalLabel">Custom SweetAlert</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>  --}}
                            <div class="modal-body">
                                <!-- Your custom message goes here -->
                                {{ session('subscription_message') }}
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Close</button>
                                <!-- You can add additional buttons here -->
                                {{--  <button type="button" class="btn btn-primary">OK</button>  --}}
                            </div>
                        </div>
                    </div>
                </div>
            @endif




            <div class="col-lg-12 col-md-12 col-sm-12">
                {{--  @if (session('subscription_message'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>{{ session('subscription_message') }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif  --}}
                {{--  @if (session('subscription_message'))
                    <div class="alert alert-danger">
                        {{ session('subscription_message') }}
                    </div>
                @endif  --}}
                @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{ session()->get('success') }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if (session()->has('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>{{ session()->get('error') }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
            </div>
            <div class="row">
                {{--  <div class="col-md-4 col-sm-6">
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
                </div>  --}}
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
                                @if ($Plan->price == 5)
                                    <li><span class="bx bx-check me-2"></span>All premium templates</li>
                                    <li><span class="bx bx-x me-2"></span>24/7 support</li>
                                @endif
                                @if ($Plan->price == 10)
                                    <li><span class="bx bx-check me-2"></span>All premium templates</li>
                                    <li><span class="bx bx-x me-2"></span>24/7 support</li>
                                @endif
                                @if($Plan->price == 15)
                                    <li><span class="bx bx-check me-2"></span>All premium templates</li>
                                    <li><span class="bx bx-check me-2"></span>24/7 support</li>
                                @endif
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Check if the session variable is present
            @if (session('subscription_message'))
                // Open the modal when the page is reloaded
                $('#customModal').modal('show');
            @endif
        });
    </script>
</div>
{{--  hello new  --}}
