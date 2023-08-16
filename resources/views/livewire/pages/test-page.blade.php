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
            <button style="background-color: #FF6600;color: #fff;"><a href=""> Let's Create
                </a></button>
            <button style=" background-color: Transparent;">Go Premium</button><br><br>
        </div>
        <div class="col-lg-5 col-md-6 col-sm-3 mt-5 mb-4">
            <img src="{{asset('web-images/Group.svg')}}" class="img-fluid w-90 pt-2" alt="">
        </div>
    </div>
</section>
<!-- simple resume template -->
<section class="mt-5 text-center simple-section">
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
    <div class="container-fluid">
        <div class="row resume-card-section row1">
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
                <img src="{{ asset('web-images/Frame.svg') }}" class="img-fluid w-75" alt="" style="float:left">
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
            <div class="col-12 col-md-6 col-sm-3 mt-5 print-ready-section">
                <p style="color: #F60;">Print Ready Design</p>
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
        <div class="row port-folio-section row1">
            @for ($i = 0 ; $i < 3 ; $i++) <div class="col-lg-4 col-md-6 col-sm-12" style="margin-bottom:8rem">
                <div class="card">
                    <div class="card1">
                        <img src="{{ asset('web-images/download.png') }}" class="mx-auto d-block">
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
<footer class="mt-2" style="background-color:#FF6600; ">
    <div class="container">
        <div class="row footers-section pb-5">
            <div class="col-lg-6 col-md-6 col-sm-12 mt-5">
                <h2><a class="navbar-brand text-light" href="#" style="font-size:2.25rem;">{{ config('app.name') }}</a>
                </h2><br>
                <p class="w-50">Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit nulla ipsum iste maiores,
                    ducimus hic
                    iure vitae consequatur esse sed.</p><br>

            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 mt-5 learn-more">
                <h2>Lear</h2><br>
                <a href="#">Career Blog</a><br>
                <a href="#">How to write a Resume</a><br>
                <a href="#">How to write a CV</a><br>
                <a href="#">How to write a Cover Letter</a><br>
                <a href="#">Resume Example</a><br>
                <a href="#">Cover Letter Example</a><br>


            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 mt-5">
                <h2>Other</h2><br>
                <a href="#">Pricing</a><br>
                <a href="#">About Us</a><br>
                <a href="#">E-book: How to Get a job in 2023</a><br>
                <a href="#">Media Kit</a><br>
                <a href="#">Help Center</a><br>
            </div>
        </div>
    </div>


</footer>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

    body {
        box-sizing: border-box;
        font-family: 'Poppins';
        font-size: 20px;
    }

    /* hero-section */
    .hero-section {
        background-color: rgba(255, 102, 0, 0.10);
    }

    .hero-section-column h2 {
        color: #000;
        font-family: Poppins;
        font-size: 3.751rem;
        font-style: normal;
        font-weight: 700;
        line-height: normal;
    }

    .hero-section-column p {
        width:85%;
        color: #000;
        text-align: justify;
        font-family: Poppins;
        font-size: 1.5rem;
        font-style: normal;
        font-weight: 500;
        line-height: normal;
    }

    .hero-section-column button {
        width: 15.375rem;
        height: 4.938rem;
        margin: 50px 0px 0px 0px;
        padding: 10px;
        border: 2px solid #FF6600;
        border-radius: 0.625rem;

    }

    .hero-section-column button a {
        margin-bottom: 10px;
        text-decoration: none;
        color: #fff;
    }

    /* simple section */
    .simple-section h2 b {
        color: #F60;
        text-align: justify;
        font-family: 'Poppins';
        font-size: 3rem;
        font-style: normal;
        font-weight: 600;
        /* line-height: normal; */

    }

    .simple-section p {
        margin: 2% 0px 3% 0px;
        color: #000;
        font-family: 'Poppins';
        font-size: 1.5rem;
        font-style: normal;
        font-weight: 500;

    }

    /* print ready design */
    .print-ready-section h2 b {
        color: #000;
        font-family: 'Poppins';
        font-size: 3.125rem;
        font-style: normal;
        font-weight: 700;
        text-align: justify;
        /* line-height: normal; */
    }

    .print-ready-section p {
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

    .print-ready-section button {
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

    .print-ready-section button a {
        font-family: 'Poppins';
        margin-bottom: 10px;
        text-decoration: none;
        color: #fff;
    }

    /* resume card  */
    .resume-card-section .card {
        background-color: rgba(255, 102, 0, 0.10);
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

    .how-its-work button {
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

    .how-its-work button a {
        font-family: 'Poppins';
        margin-bottom: 10px;
        text-decoration: none;
        color: #fff;
    }


    /* port Folio section */
    .port-folio-section .card {
        background-color: rgba(255, 102, 0, 0.10);
        border-radius: 30px;
    }

    .port-folio-section .card .card1 img {
        margin-top: -6rem;
        background-color: none;
        width: 12rem;
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
        padding: 2rem;
        text-align: justify;
        font-size: 1.25rem;
        font-family: 'Poppins';
        font-weight: 600;
        word-wrap: break-word
    }

    /* footer section */
    .footers-section h2 {
        color: #FFF;
        font-size: 2.25rem;
    }

    .footers-section p {
        font-size: 1rem;
        color: #FFF;
        text-align: justify;
    }

    .footers-section a {

        text-decoration: none;
        color: white;
        font-size: 1.5rem;
    }

    /* responsive css */
    @media only screen and (max-width:2560px) and (min-width:951px) {

        /* navbar */
        .navbar-brand {
            margin-left: -6rem;
        }

        .navbar-nav {
            margin-right: -9rem;
        }

        .navbar-nav .nav-item .nav-link {
            /* margin-right:-3rem; */
            padding: 0rem 3.5rem 0rem 1rem;
        }

        /* hero section */
        .hero-section {
            width: 100%;
            height: 45.75rem;

        }

        .hero-left-section {
            padding-left: 10%;
            padding-top: 5%;
        }

        .hero-section-column h2 {
            color: #000;
            font-family: Poppins;
            font-size: 60.008px;
            font-style: normal;
            font-weight: 700;
            line-height: normal;
        }

        .hero-section img {
            padding-left: 1%;
        }
    }

    @media only screen and (max-width:1440px) and (min-width:951px) {

        /* nav bar */
        .navbar-brand {
            margin-left: 0rem;
        }

        .navbar-nav {
            margin-right: 0rem;
        }

        /* hero section */
        .hero-left-section {
            padding-left: 5%;
            padding-top: 3%;
        }

        .hero-section img {
            padding-right: 15%;
            padding-top: 5%;
        }
    }

    @media only screen and (min-width:1024px) and (max-width:1024px) {

        /* navbar  */
        .navbar-nav .nav-item .nav-link {
            /* margin-right:-3rem; */
            padding: 0rem 1.5rem 0rem 1rem;
        }
    }

    @media only screen and (min-width:768px) and (max-width:951px) {}

    @media only screen and (min-width:425px) and (max-width:951px) {}

    @media only screen and (min-width:375px) and (max-width:951px) {}

    @media only screen and (min-width:320px) and (max-width:951px) {
        /* hero section */

        /* how it's work */
        .how-its-work .text-left {
            padding: 0.20rem;
            word-wrap: break-word;
        }

        /* print ready file */
        .print-ready-section .responsive-print-ready-section {
            padding: 0.30rem;
            word-wrap: break-word;
            line-height: 1.5em;
        }


        .print-ready-section img {
            float: none;
        }

        /* port folio section */
        .port-folio-section .card {
            margin-top: -3rem;
        }

        .port-folio-section .card .card1 img {
            margin-top: -4rem;
            width: 8rem;
            height: auto;
        }

        .port-folio-section .card .card1 p {
            padding: 0.20rem;
            font-size: 1rem;
            word-wrap: break-word;
            line-height: 1.5;
        }
    }


    /* row responsive */
    .row1 {
        --bs-gutter-x: 1.5rem;
        --bs-gutter-y: 0;
        display: flex;
        flex-wrap: wrap;
        margin-top: calc(1 * var(--bs-gutter-y));
        margin-right: calc(0.5 * var(--bs-gutter-x));
        margin-left: calc(0.5 * var(--bs-gutter-x));
    }

</style>
