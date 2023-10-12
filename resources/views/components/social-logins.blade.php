<div class="text-center custom-google-facrbook-login center-block ">
    <div class="mb-2">
        <a href="{{ route('google.page') }}">
            <button type="submit" class="p-2 google-bg custom-google-login-btn btn-block">
                <span class="bi bi-google text-light"></span>{{ app('googleTranslator', ['string' => 'Sign in with Google']) }}
            </button>
        </a>
    </div>
     <div>
        <a href="{{ route('linkedin.page') }}">
            <button type="submit" class="p-2 linkedin-bg custom-linkedin-login-btn btn-block">
                <span class="bx bxl-linkedin bx-linkedin linkedin-bg text-light"></span>{{ app('googleTranslator', ['string' => 'Sign in with LinkedIn']) }}
            </button>
        </a>
    </div>
</div>
