<div>
    <!-- hero section -->
    <section class="hero-section">
        <div class="row row1">
            <div class="mt-5 col-lg-7 col-md-6 col-sm-3 hero-section-column hero-left-section">
                <h2>
                    Pick A Template
                </h2>
                <h2 class="mt-2">
                    For Your Next Dream Job
                </h2>
                <p>Quickly design and customize responsive mobile-first sites with Bootstrap, the
                    world’s most popular front-end open source toolkit!</p>
                <button class="lets-created"><a href="{{ route('templates.resume') }}"> Let's Create</a></button>
                <button class="go-premium"> <a href="#">Go Premium </a></button><br><br>
            </div>
            <div class="mt-5 mb-4 col-lg-5 col-md-6 col-sm-3">
                <img src="{{ asset('web-images/Group.svg') }}" class="pt-2 img-fluid w-90" alt="">
            </div>
        </div>
    </section>
    <!-- simple resume template -->
    <section class="mt-5 text-center simple-section">
        <h2>
            <b class="standard-heading-css">
                Resume Templates
            </b>
        </h2>
        <p>
            Let's create something better
        </p>
    </section>
    <!-- resume card section -->
    <section class="mt-5">
        <div class="container-fluid">
            <div class="row resume-card-section row1">
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
                                    Select Template
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
                {{-- <div class="d-flex justify-content-center">
                {{$Resumes->links()}}
            </div> --}}
            </div>
        </div>
    </section>
    <!-- how it works -->
    <section class="mt-5 mb-5 how-its-work">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 col-sm-3">
                    <img src="{{ asset('web-images/Frame.svg') }}" class="img-fluid w-75" alt="" style="float:left">
                </div>
                <div class="col-12 col-md-6 col-sm-3 left-side">
                    <p class="p1">How it works</p>
                    <h2> Select A Template & Fill Your Information </h2>
                    <p class="text-left p2">Lorem ipsum dolor sit amet consectetur. Nulla vel risus adipiscing quisque vitae
                        lectus eget. Elit nunc dapibus urna faucibus. Ut sagittis massa congue in porttitor. Elementum
                        commodo tempor vestibulum sed erat mollis.</p>
                    <button class="custom-button-css"><a href="{{ route('templates.resume') }}"> Choose Template </a></button><br><br>
                </div>
            </div>
        </div>
    </section>
    <!-- prints ready design -->
    <section class="mt-5 mb-5">
        <div class="container">
            <div class="row">
                <div class="mt-5 col-12 col-md-6 col-sm-3 print-ready-section">
                    <p class="print">Print Ready Design</p>
                    <h2>
                        <b>
                            Finished With Your Information, Just Click The Print Button
                        </b><br>
                    </h2>
                    <p class="text-left w-80 responsive-print-ready-section">Lorem ipsum dolor sit amet consectetur. Nulla
                        vel risus adipiscing quisque
                        vitae lectus eget. Elit nunc dapibus urna faucibus. Ut sagittis massa congue in porttitor. Elementum
                        commodo tempor vestibulum sed erat mollis.</p>
                    <button class="custom-button-css"><a href="#"> Let's Create </a></button><br><br>
                </div>
                <div class="mt-5 col-12 col-md-6 col-sm-3">
                    <img src="{{ asset('web-images/Group43.svg') }}" class="img-fluid w-90 " alt="" style="float:right">
                </div>
            </div>
        </div>
    </section>
    <!-- user’s review section -->
    <section class="mt-5 text-center review-section">
        <h2>
            <b class="standard-heading-css">
                User’s Reviews
            </b>
        </h2>
        <p>
            What users says about us
        </p>
    </section><br><br><br>
    <!-- portfolio section  -->
    <section class="mt-5">
        <div class="container-fluid">
            <div class="row portfolio-section row1">
                @for ($i = 0; $i < 3; $i++)
                    <div class="col-lg-4 col-md-6 col-sm-12" style="margin-bottom:6rem">
                        <div class="card">
                            <div class="card1">
                                <img src="{{ asset('web-images/download.png') }}" class="mx-auto d-block">
                                <div class="card-body">
                                    <h2 class="text-center">
                                        Rana Waseem Rajpoot
                                    </h2>
                                    <h5 class="text-center para-start">UI/UX Designer <i class="bi bi-star"></i><i class="bi bi-star"></i><i class="bi bi-star"></i><i class="bi bi-star"></i></h5>
                                    <p>
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum hic laboriosam
                                        molestiae cum minima sint praesentium magni inventore doloribus recusandae, eveniet
                                        iste
                                        doloremque, voluptates necessitatibus nisi similique alias, neque beatae?
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endfor
            </div>
        </div>
    </section>
</div>
