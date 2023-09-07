<div>
    <!-- hero section -->
    <section class="hero-section">
        <div class="row row1">
            <div class="mt-5 col-lg-7 col-md-6 col-sm-3 hero-section-column hero-left-section">
                <h2>
                    {{ GoogleTranslate::trans('Pick A Template', app()->getLocale())}}
                </h2>
                <h2 class="mt-2">
                    {{ GoogleTranslate::trans('For Your Next Dream Job', app()->getLocale())}}
                </h2>
                <p>{{ GoogleTranslate::trans('Quickly design and customize responsive mobile-first sites with Bootstrap, the world’s most popular front-end open source toolkit!', app()->getLocale())}}</p>
                <button class="lets-created"><a href=""> {{ GoogleTranslate::trans('Lets Create', app()->getLocale())}}</a></button>
                <button class="go-premium"> <a href="">
                   {{ GoogleTranslate::trans(' Go Premium', app()->getLocale())}}
                 </a></button><br><br>
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
                {{ GoogleTranslate::trans('Resume Templates', app()->getLocale())}}
            </b>
        </h2>
        <p>
            {{ GoogleTranslate::trans(' Lets create something better', app()->getLocale())}}
        </p>
    </section>
    <!-- resume card section -->
    <section class="mt-5">
        <div class="container-fluid">
            <div class="row resume-card-section row1">
                @foreach ($Resumes as $SingleIndex)
                    <div class="mb-3 col-lg-4 col-md-6 col-sm-12">
                        <div class="card">
                            <img src="{{ asset('storage/images/resumes/' . $SingleIndex->front_image) }}" loading="lazy" class="p-3 img-fluid" alt="">
                            <div class="btn-resume-section">
                                <a href="{{ route('edit.resume.form', $SingleIndex->id) }}">
                                {{ GoogleTranslate::trans(' Select Template', app()->getLocale())}}
                                </a>
                            </div>
                        </div>
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
                    <p class="p1">
                        {{ GoogleTranslate::trans(' How it works', app()->getLocale())}}
                    </p>
                    <h2>
                       {{ GoogleTranslate::trans(' Select A Template & Fill Your Information', app()->getLocale())}}
                    </h2>
                    <p class="text-left p2">{{ GoogleTranslate::trans('  Lorem ipsum dolor sit amet consectetur. Nulla vel risus adipiscing quisque vitae
                                            lectus eget. Elit nunc dapibus urna faucibus. Ut sagittis massa congue in porttitor. Elementum
                                            commodo tempor vestibulum sed erat mollis.', app()->getLocale())}}</p>
                    <button class="custom-button-css"><a href="{{ route('templates.resume') }}">
                       {{ GoogleTranslate::trans(' Select Template', app()->getLocale())}}
                    </a></button><br><br>
                </div>
            </div>
        </div>
    </section>
    <!-- prints ready design -->
    <section class="mt-5 mb-5">
        <div class="container">
            <div class="row">
                <div class="mt-5 col-12 col-md-6 col-sm-3 print-ready-section">
                    <p class="print">Print
                        {{ GoogleTranslate::trans(' Ready Design', app()->getLocale())}}
                    </p>
                    <h2>
                        <b>
                          {{ GoogleTranslate::trans('Finished With Your Information, Just Click The Print Button', app()->getLocale())}}
                        </b><br>
                    </h2>
                    <p class="text-left w-80 responsive-print-ready-section">
                       {{ GoogleTranslate::trans('Lorem ipsum dolor sit amet consectetur. Nulla vel risus adipiscing quisqu
                       vitae lectus eget. Elit nunc dapibus urna faucibus. Ut sagittis massa congue in porttitor. Elementum
                       commodo tempor vestibulum sed erat mollis.', app()->getLocale())}}
                    </p>
                    <button class="custom-button-css"><a href="#">
                       {{ GoogleTranslate::trans(' Lets Create ', app()->getLocale())}}
                    </a></button><br><br>
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
                {{ GoogleTranslate::trans('  Our User’s Reviews About Our Templates ', app()->getLocale())}}

            </b>
        </h2>
        <p>
            {{ GoogleTranslate::trans(" Let's create something better", app()->getLocale())}}

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
                                    {{ GoogleTranslate::trans(" Rana Waseem Rajpoot", app()->getLocale())}}
                                    </h2>
                                    <h5 class="text-center para-start">
                                        {{ GoogleTranslate::trans('   UI/UX Designer  ', app()->getLocale())}}
                                        <i class="bi bi-star"></i><i class="bi bi-star"></i><i class="bi bi-star"></i><i class="bi bi-star"></i></h5>
                                    <p>
                                      {{ GoogleTranslate::trans('Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum hic laboriosam
                                                                molestiae cum minima sint praesentium magni inventore doloribus recusandae, eveniet iste
                                                                doloremque, voluptates necessitatibus nisi similique alias, neque beatae? ', app()->getLocale())}}
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
