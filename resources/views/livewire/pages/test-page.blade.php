<!-- Hero section -->
<section class="hero-section ">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6 col-sm-3 mt-5 hero-section-left-column">
                <h2>
                    <b>
                        Pick A Template
                    </b><br>
                </h2>
                <h2>
                    <b>
                        For Your Next Dream Job
                    </b>
                </h2>
                <p class="w-80 text-left">Quickly design and customize responsive mobile-first sites with Bootstrap, the
                    world’s most popular front-end open source toolkit!</p>
                <button style="background-color: #FF6600;color: #fff;"><a href=""> Let's Create </a></button>
                <button>Let's Create</button><br><br>
            </div>
            <div class="col-12 col-md-6 col-sm-3 mt-5">
                <img src="{{ asset('storage/images/resumes/Group.svg') }}" class="img-fluid w-100" alt="">
            </div>
        </div>
    </div>
</section>
<!-- simple resume template -->
<section class="mt-5 text-center secound-section">
    <h2>
        <b>
            Resume Templates
        </b>
    </h2>
    <p>
        Let's create something better
    </p>
</section>
<!-- resume card section  -->
<section class="mt-5">
    <div class="container">
        <div class="row resume-card-section">
            @for($i = 1; $i <= 6; $i++) <div class="col-lg-4 col-md-6 col-sm-12 mb-3">
                <div class="card">
                    <img src="{{ asset('storage/images/resumes/1-B-01.webp') }}" loading="lazy" class="img-fluid p-3"
                        alt="">
                    <div class="btn-resume-section">
                        <a href="#">Select Template</a>
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
            <div class="col-12 col-md-6 col-sm-3 mt-5">
                <img src="{{ asset('storage/images/resumes/Frame.svg') }}" class="img-fluid w-75" alt=""
                    style="float:left">
            </div>
            <div class="col-12 col-md-6 col-sm-3 mt-5 hero-section-left-column">
                <p style="color: #F60;">How it's works</p>
                <h2>
                    <b>
                        Select A Template & Fill Your Information
                    </b><br>
                </h2>

                <p class="w-80 text-left">Lorem ipsum dolor sit amet consectetur. Nulla vel risus adipiscing quisque
                    vitae lectus eget. Elit nunc dapibus urna faucibus. Ut sagittis massa congue in porttitor. Elementum
                    commodo tempor vestibulum sed erat mollis.</p>
                <button style="background-color: #FF6600;color: #fff;"><a href=""> Let's Create </a></button><br><br>
            </div>
        </div>
    </div>
</section>
<!-- print ready design -->
<section class="mt-5 mb-5">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6 col-sm-3 mt-5 hero-section-left-column">
                <p style="color: #F60;">Print Ready Design</p>
                <h2>
                    <b>
                        Finished With Your Information, Just Click The Print Button
                    </b><br>
                </h2>
                <p class="w-80 text-left">Lorem ipsum dolor sit amet consectetur. Nulla vel risus adipiscing quisque
                    vitae lectus eget. Elit nunc dapibus urna faucibus. Ut sagittis massa congue in porttitor. Elementum
                    commodo tempor vestibulum sed erat mollis.</p>
                <button style="background-color: #FF6600;color: #fff;"><a href=""> Let's Create </a></button><br><br>
            </div>
            <div class="col-12 col-md-6 col-sm-3 mt-5">
                <img src="{{ asset('storage/images/resumes/Group43.svg') }}" class="img-fluid w-75 " alt=""
                    style="float:right">
            </div>
        </div>
    </div>
</section>
<!-- User’s Review section -->
<section class="mt-5 text-center review-section">
    <h2>
        <b style="color:#FF6600;">
            Our User’s Review About Our Templates
        </b>
    </h2>
    <p>
        Let's create something better
    </p>
</section><br><br><br>
<!-- port folio section  -->
<section class="mt-5">
    <div class="container-fluid">
        <div class="row port-folio-section">
            @for ($i = 0 ; $i < 3 ; $i++) <div class="col-lg-4 col-md-6 col-sm-12" style="margin-bottom:8rem">
                <div class="card">
                    <div class="card1">
                        <img src="{{ asset('storage/images/resumes/download.png') }}" class="mx-auto d-block">
                        <div class="card-body">
                            <h2 class="text-center">
                                Rana Waseem Rajpoot
                            </h2>

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
<!-- footer section -->
<section class="mt-2" style="background-color:#FF6600; ">
    <div class="container">
        <div class="row footers-section pb-5">
            <div class="col-lg-6 col-md-6 col-sm-12 mt-5">
                <h2><a class="navbar-brand text-light" href="#" style="font-size:2.25rem;">{{ config('app.name') }}</a></h2>
                <p class="w-50">Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit nulla ipsum iste maiores, ducimus hic
                    iure vitae consequatur esse sed.</p><br>
                    <h2>Social Media</h2>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 mt-5 learn-more">
                <h2>Lear</h2>
                <a href="#">Career Blog</a>
                <a href="#">How to write a Resume</a>
                <a href="#">How to write a CV</a>
                <a href="#">How to write a Cover Letter</a>
                <a href="#">Resume Example</a>
                <a href="#">Cover Letter Example</a>


            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 mt-5">
                <h2>Other</h2>
                <a href="#">Pricing</a><br>
                <a href="#">About Us</a><br>
                <a href="#">E-book: How to Get a job in 2023</a><br>
                <a href="#">Media Kit</a><br>
                <a href="#">Help Center</a><br>
            </div>
        </div>
    </div>


</section>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');

    body {
        box-sizing: border-box;
        font-family: 'Poppins';
        font-size: 20px;
    }


    /* hero-section */
    .hero-section {
        background-color: rgba(255, 102, 0, 0.10);
    }

    .hero-section-left-column h2 b {
        color: #000;
        font-family: 'Poppins';
        font-size: 3.125rem;
        font-style: normal;
        font-weight: 700;
        text-align: justify;
        /* line-height: normal; */
    }

    .hero-section-left-column p {
        margin-top: 5%;
        margin-bottom: 5%;
        text-align: justify;
        color: #000;
        text-align: justify;
        font-family: 'Poppins';
        font-size: 1.5rem;
        font-style: normal;
        font-weight: 500;
    }

    .hero-section-left-column button {
        font-family: 'Poppins';
        margin: 10px;
        width: 16rem;
        height: 5rem;
        flex-shrink: 0;
        margin: 30px 0px 0px 0px;
        padding: 10px;
        border: 2px solid #FF6600;
        border-radius: 10px;

    }

    .hero-section-left-column button a {
        font-family: 'Poppins';
        margin-bottom: 10px;
        text-decoration: none;
        color: #fff;
    }

    .secound-section h2 b {
        color: #F60;
        text-align: justify;
        font-family: 'Poppins';
        font-size: 3rem;
        font-style: normal;
        font-weight: 600;
        /* line-height: normal; */

    }

    .secound-section p {
        margin: 2% 0px 3% 0px;
        color: #000;
        font-family: 'Poppins';
        font-size: 1.5rem;
        font-style: normal;
        font-weight: 500;

    }

    /* resume card  */

    .resume-card-section .card {
        background-color: #f5ceb4;
        border-radius: 30px;
    }

    .resume-card-section .card .img-fluid {
        border-radius: 30px;
    }

    .btn-resume-section {
        margin-top: 2%;
        background-color: #FF6600;
        color: #fff;
        text-decoration: none;
        text-align: center;
        padding: 25px 0px 25px 0px;
        border-radius: 0px 0px 30px 30px;
    }

    .btn-resume-section a {
        font-family: 'Poppins';
        text-decoration: none;
        color: #fff;
    }

    /* review setiojn */
    .review-section h2 b {
        font-family: 'Poppins';
        color: #F60;
    }

    .review-section p {
        font-family: 'Poppins';
        font-size: 1.5rem;
        margin-top: 1.5rem;
        margin-bottom: 1.5rem;
        color: black;
    }

    /* section how-its-work */
    .how-its-work {
        background-color: rgba(255, 102, 0, 0.10);
    }

    /* port Folio section */
    .port-folio-section .card {
        background-color: rgba(255, 102, 0, 0.10);
        border-radius: 30px;
    }

    .port-folio-section .card .card1 img {
        margin-top: -6rem;
        background-color: none;
        width: 15rem;
        border-radius: 50%;
        border: 3px solid #F60;
    }

    .port-folio-section .card .card1 h2 {
        text-align: justify;
        color: black;
        font-size: 1.75rem;
        font-family: 'Poppins';
        font-weight: 600;
        word-wrap: break-word
    }

    .port-folio-section .card .card1 p {
        text-align: justify;
        font-size: 1.25rem;
        font-family: 'Poppins';
        font-weight: 600;
        word-wrap: break-word
    }

    /* footer section */
    .footers-section h2{
        color:#FFF;
        font-size:2.25rem;
    }
    .footers-section p{
        font-size:1rem;
        color:#FFF;
        text-align:justify;
    }
    .footers-section a{

        text-decoration:none;
        color:white;
        font-size:1.5rem;
    }
    .footers-section .learn-more .a{

    }


    /* row responsive */
    .row {
        --bs-gutter-x: 1.5rem;
        --bs-gutter-y: 0;
        display: flex;
        flex-wrap: wrap;
        margin-top: calc(1 * var(--bs-gutter-y));
        margin-right: calc(0.5 * var(--bs-gutter-x));
        margin-left: calc(0.5 * var(--bs-gutter-x));
    }

</style>
