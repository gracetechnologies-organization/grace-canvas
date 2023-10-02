<div>
    <div class="container custom-user-dashboard-container">
        @include('components.user-dashboard-heading')
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>  {{ session('success') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>  {{ session('error') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
        {{--  @if (session('success'))
            <div class="modal fade show madel" id="customModal" tabindex="-1" aria-labelledby="customModalLabel" aria-hidden="true"
                style="display: block;">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body">
                            <!-- Your custom message goes here -->
                            {{ session('success') }}
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-warning okButton">OK</button>
                        </div>
                    </div>
                </div>
            </div>
        @endif  --}}
        {{--  @if (session('error'))
            <div class="modal fade show madel" id="customModal" tabindex="-1" aria-labelledby="customModalLabel"
                aria-hidden="true" style="display: block;">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body">
                            <!-- Your custom message goes here -->
                            {{ session('error') }}
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-warning okButton">OK</button>                           
                        </div>
                    </div>
                </div>
            </div>
        @endif  --}}
        <div class="row">
            <!-- Add Bootstrap classes for responsive design -->
            <div class="col-lg-3 col-md-3 col-sm-6">
                @include('components.user-dashboard-sidebar')
            </div>
            <div class="col-lg-9 col-md-9 col-sm-6">
                <div class="content">
                    <div id="dataContainer">
                        <div class="row">
                            {{--  @dd($SaveResumePages);  --}}
                            @foreach ($SaveResumePages as $ResumePages)
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <div class="mb-3 card position-relative">
                                        {{--  <a href="{{ route('edit.resume.form', $ResumePages->id) }}">  --}}
                                            <img src="{{ asset('storage/images/resumes/' . $ResumePages->front_image) }}"
                                                class="card-img-top" alt="Image">
                                        {{--  </a>  --}}
                                        <div class="top-0 position-absolute end-0">
                                            <button class="btn btn-transparent " type="button"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="bi bi-three-dots"
                                                    style="font-size: 1.5rem; color: #FF6600;"></i>
                                            </button>
                                            <ul class="dropdown-menu custome-button-user-templates" aria-labelledby="dropdownMenuButton">

                                                <li><a class="dropdown-item" href="{{ route('edit.saved.resume', $ResumePages->id) }}">Edit</a></li>                                                                                          
                                                
                                                @if ($ResumePages->id != 0)
                                                     <li><a class="dropdown-item" href="#" wire:click="destroy({{ $ResumePages->id }})">Delete</a></li>
                                                @endif

                                                {{--  <li><a class="dropdown-item" href="#">Delete</a></li>  --}}
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Check if the session variable is present
            @if (session('success'))
                $('#customModal').modal('show');
            @endif

            @if (session('error'))
                $('#customModal').modal('show');
            @endif

            // Add JavaScript to hide the modal when the "OK" button is clicked
            $('.okButton').on('click', function() {
                $('#customModal').modal('hide');
            });
        });
    </script>  --}}
    
</div>