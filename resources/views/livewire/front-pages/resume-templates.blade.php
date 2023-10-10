<div>
    <!-- categories section  -->
    <section class="category-section">
        <div class="container-fluid">
            <div class="ml-5 row custome-background">
                {{--  
                <div class="text-center ">
                    <h2 class="mt-5 text-center standard-heading-css">{{ app('googleTranslator', ['string' => 'Categories']) }}</h2>
                </div>
                <div class="col-lg-12 col-sm-12 ">
                    <div class="mb-5 frame">
                        <button class="custom-btn btn-5"><span><a href="#" class="resumes">All</a></span></button>
                        <button class="custom-btn btn-11"><span><a href="#">IT</a></span></button>
                        <button class="custom-btn btn-15"><span><a href="#">Designer</a></span></button>
                        <button class="custom-btn btn-5"><span><a href="#" class="resumes">CSR</a></span></button>
                        <button class="custom-btn btn-9"><span><a href="#">See More</a></span></button>
                    </div>
                </div>  
                --}}
            </div>
        </div>
    </section>
    <!-- resume card section  -->
    <section>
        <div class="container-fluid">
            <div class="row resume-card-section row1">
                <div class="mt-5 text-center">
                    <h2 class="text-center standard-heading-css custom-margin-css"> {{ app('googleTranslator', ['string' => 'Resume Templates']) }} </h2>
                </div>
                @include('components.resumes-grid')
            </div>
        </div>
    </section>
    <div class="custom-pagenator-page d-flex justify-content-center">
        {{ $Resumes->links() }}
    </div>
</div>
