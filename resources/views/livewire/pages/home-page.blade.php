<!-- Hero section -->
<section class="hero-section">
    <div class="row row1">
        <div class="col-lg-7 col-md-6 col-sm-3 mt-5 hero-section-column hero-left-section">
            <h2>
                Pick A Template
            </h2>
            <h2 class="mt-2">
                For Your Next Dream Job
            </h2>
            <p>Quickly design and customize responsive mobile-first sites with Bootstrap, the
                world’s most popular front-end open source toolkit!</p>
            <button class="lets-created"><a href=""> Let's Create</a></button>
            <button class="go-premium"> <a href="">Go Premium </a></button><br><br>
        </div>
        <div class="col-lg-5 col-md-6 col-sm-3 mt-5 mb-4">
            <img src="{{ asset('web-images/Group.svg') }}" class="img-fluid w-90 pt-2" alt="">
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
<!-- resume card section  -->
<section class="mt-5">
    <div class="container-fluid">
        <div class="row resume-card-section row1">
            @for ($i = 1; $i <= 6; $i++)
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
<!-- how it's work -->
<section class="mt-5 mb-5 how-its-work">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6 col-sm-3">
                <img src="{{ asset('web-images/Frame.svg') }}" class="img-fluid w-75" alt="" style="float:left">
            </div>
            <div class="col-12 col-md-6 col-sm-3 left-side">
                <p class="p1">How it works</p>
                <h2> Select A Template & Fill Your Information </h2>
                <p class="text-left p2">Lorem ipsum dolor sit amet consectetur. Nulla vel risus adipiscing quisque vitae lectus eget. Elit nunc dapibus urna faucibus. Ut sagittis massa congue in porttitor. Elementum commodo tempor vestibulum sed erat mollis.</p>
                <button ><a href=""> Let's Create </a></button><br><br>
            </div>
        </div>
    </div>
</section>
<!-- print ready design -->
<section class="mt-5 mb-5">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6 col-sm-3 mt-5 print-ready-section">
                <p class="print">Print Ready Design</p>
                <h2>
                    <b>
                        Finished With Your Information, Just Click The Print Button
                    </b><br>
                </h2>
                <p class="w-80 text-left responsive-print-ready-section">Lorem ipsum dolor sit amet consectetur. Nulla
                    vel risus adipiscing quisque
                    vitae lectus eget. Elit nunc dapibus urna faucibus. Ut sagittis massa congue in porttitor. Elementum
                    commodo tempor vestibulum sed erat mollis.</p>
                <button style="background-color: #FF6600;color: #fff;"><a href=""> Let's Create </a></button><br><br>
            </div>
            <div class="col-12 col-md-6 col-sm-3 mt-5">
                <img src="{{ asset('web-images/Group43.svg') }}" class="img-fluid w-90 " alt="" style="float:right">
            </div>
        </div>
    </div>
</section>
<!-- User’s Review section -->
<section class="mt-5 text-center review-section">
    <h2>
        <b class="standard-heading-css">
            Our User’s Reviews About Our Templates
        </b>
    </h2>
    <p>
        Let's create something better
    </p>
</section><br><br><br>
<!-- port folio section  -->
<section class="mt-5">
    <div class="container-fluid">
      <div class="row portfolio-section row1">
            @for ($i = 0 ; $i < 3 ; $i++) 
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
                                molestiae cum minima sint praesentium magni inventore doloribus recusandae, eveniet iste
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
