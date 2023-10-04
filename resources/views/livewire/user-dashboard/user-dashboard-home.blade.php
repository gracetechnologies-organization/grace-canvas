<div>
    <div class="container custom-user-dashboard-container">
        @include('components.user-dashboard-heading')
        <div class="row">
            <!-- Add Bootstrap classes for responsive design -->
            <div class="col-lg-3 col-md-3 col-sm-6">
                @include('components.user-dashboard-sidebar')
            </div>
            <div class="col-lg-9 col-md-9 col-sm-6">
                <div class="content">
                    <div id="dataContainer">
                        @if (session('subscription_message'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>{{ session('subscription_message') }}</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
                        <div class="row">
                            <div class="mb-4 card custome-card-border">
                                <h5 class="card-header">Profile Details</h5>
                                <div class="card-body">
                                    <input type="hidden" name="id" value="">
                                    <div class="row">
                                        <div class="mb-3 col-md-6">
                                            <label for="name" class="form-label">{{ app('googleTranslator', ['string' => 'Name']) }}</label>
                                            <p>{{ app('googleTranslator', ['string' => $data->name ]) }}</p>
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label for="email" class="form-label">{{ app('googleTranslator', ['string' => 'E-mail']) }}</label>
                                            <p>{{ app('googleTranslator', ['string' => $data->email ]) }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
