{{-- categories section --}}
<section class="category-section">
    <div class="container-fluid ">
        <div class="row ml-5 custome-background">
            <div class="text-center ">
                <h2 class="text-center standard-heading-css mt-5">Categories</h2>
            </div>
            <div class="col-lg-12 col-sm-12 ">
                <div class="frame mb-5">
                    <button class="custom-btn btn-5"><span>Resumes</span></button>
                    <button class="custom-btn btn-11"><span>CVs</span></button>
                    <button class="custom-btn btn-15"><span>Cover Latters</span></button>
                    <button class="custom-btn btn-5"><span>Cover Latters</span></button>
                    <button class="custom-btn btn-9"><span>See More</span></button>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- resume card section  -->
<section>
    <div class="container-fluid">
        <div class="row resume-card-section row1">
            <div class="text-center ">
                <h2 class="text-center standard-heading-css custom-margin-css"> Resume Templates </h2>
            </div>
            @for ($i = 1; $i <= 12; $i++)
                <div class="col-lg-4 col-md-6 col-sm-12 mb-3">
                    <div class="card">
                        <img src="{{ asset('storage/images/resumes/1-B-01.webp') }}" loading="lazy" class="img-fluid p-5" alt="">
                        <div class="btn-resume-section">
                            <a href="{{ route('edit.resume.form', ['ID' => 1]) }}">Select Template</a>
                        </div>
                    </div>
                </div>
            @endfor
        </div>
    </div>
</section>

