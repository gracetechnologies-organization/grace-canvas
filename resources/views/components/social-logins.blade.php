<div class="text-center custom-google-facrbook-login center-block ">
    <div class="mb-2">
        <a href="{{ route('google.page') }}">
            <button type="submit" class="p-2 custom-google-login-signup btn-block">
                <span class="bi bi-google"></span>{{ GoogleTranslate::trans('Google Login', app()->getLocale()) }}
            </button>
        </a>
    </div>
     <div>
        <a href="{{ route('linkedin.page') }}">
            <button type="submit" class="p-2 custom-linkedin-login-signup btn-block">
                <span class="bx bxl-linkedin bx-linkedin"></span>{{ GoogleTranslate::trans('LinkedIn Login', app()->getLocale()) }}
            </button>
        </a>
    </div>
</div>
