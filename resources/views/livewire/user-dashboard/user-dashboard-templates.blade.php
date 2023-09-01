<div>
    @extends('livewire.user-dashboard.user-dashboard')
    @section('user-dashboard')
    {{-- @dd($Resumes) --}}
    <div class="row">
        @foreach ($Resumes as $Resume)
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="mb-3 card position-relative">

                    <a href="{{ route('edit.resume.form',$Resume->id) }}">
                        <img src="{{ asset('storage/images/resumes/'.$Resume->front_image) }}" class="card-img-top" alt="Image">
                    </a>
                    <div class="top-0 position-absolute end-0">
                        <button class="btn btn-transparent " type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-three-dots" style="font-size: 1.5rem; color: #FF6600;"></i>
                        </button>
                        <ul class="dropdown-menu custome-button-user-templates" aria-labelledby="dropdownMenuButton">
                            <li><a class="dropdown-item" href="#">Edit</a></li>
                            <li><a class="dropdown-item" href="#">Delete</a></li>
                        </ul>
                    </div>
                    {{--  <div class="card-body">
                    </div>  --}}
                </div>
            </div>
        @endforeach
    </div>

    @endsection
    <style>
        .btn-transparent:focus {
            outline: none;    /* Remove the outline */
            border:2px solid #FF6600 ;
        }
        .custome-button-user-templates{
        }
    </style>
</div>
