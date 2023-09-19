@foreach ($Resumes as $SingleIndex)
    <div class="mb-3 col-lg-4 col-md-6 col-sm-12">
        <a href="{{ route('edit.resume.form', $SingleIndex->id) }}" class="text-decoration-none" target="_blank">
            <div class="card">
                {{-- version:1 == Premium template --}}
                @if ($SingleIndex->version === 1)
                    <div class="top-0 position-absolute end-0">
                        <button class="btn btn-secondary my-4 mx-4 py-2" type="button" title="Premium template">
                            <i class='bx bxs-crown bx-sm text-warning'></i>
                        </button>
                    </div>
                @endif
                <img src="{{ asset('storage/images/resumes/' . $SingleIndex->front_image) }}" loading="lazy" class="p-3 img-fluid" alt="">
                <div class="btn-resume-section">
                    {{ app('googleTranslator', ['string' => 'Select Template']) }}
                </div>
            </div>
        </a>
    </div>
@endforeach
