<div>
{{-- categories section --}}
<section class="category-section">
    <div class="container-fluid ">
        <div class="ml-5 row custome-background">
            <div class="text-center ">
                <h2 class="mt-5 text-center standard-heading-css">Categories</h2>
            </div>
            <div class="col-lg-12 col-sm-12 ">
                <div class="mb-5 frame">
                    <button class="custom-btn btn-5"><span><a href="" class="resumes">Resumes</a></span></button>
                    <button class="custom-btn btn-11"><span><a href="">CVs</a></span></button>
                    <button class="custom-btn btn-15"><span><a href=""> Latters</a></span></button>
                    <button class="custom-btn btn-5"><span><a href=""class="resumes">Cover Latters</a></span></button>
                    <button class="custom-btn btn-9"><span><a href="">See More</a></span></button>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- resume card section  -->
<section>
    <div class="container-fluid">
        <div class="row resume-card-section row1">
            <div class="mt-5 text-center">
                <h2 class="text-center standard-heading-css custom-margin-css"> Resume Templates </h2>
            </div>
            @foreach ($Resumes as $SingleIndex)
                <div class="mb-3 col-lg-4 col-md-6 col-sm-12">
                    <div class="card">
                        <img src="{{ asset('storage/images/resumes/'.$SingleIndex->front_image) }}" loading="lazy" class="p-3 img-fluid" alt="">
                        <div class="btn-resume-section">
                            <a href="{{ route('edit.resume.form',$SingleIndex->id) }}">Select Template</a>
                        </div>
                    </div>
                </div>
             @endforeach
        </div>
    </div>
</section>
<div class="custom-pagenator-page d-flex justify-content-center">
    {{$Resumes->links() }}
</div>
</div>
