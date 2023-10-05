<div class="form-container">
    <h2 class="text-center standard-heading-css"> {{ app('googleTranslator', ['string' => 'Unlock Your Dashboard']) }} </h2>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="my-2 mb-2">
            <label for="email" class="mt-2" :value="__('Email')"> {{ app('googleTranslator', ['string' => 'Email']) }} </label>
            <input type="email" name="email" id="email" class="mt-2 mb-2 form-control" value="{{ old('email') }}" required autofocus autocomplete="username">
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>
        <div class="my-2 mb-2">
            <label for="password" class="mt-2" :value="__('Password')"> {{ app('googleTranslator', ['string' => 'Password']) }} </label>
            <input type="password" id="password" class="mt-2 form-control" name="password" required autocomplete="current-password">
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>
        <div class="my-2 mb-2">
            <label class="mt-2 form-check-label" class="mt-2"><input type="checkbox"> {{ app('googleTranslator', ['string' => 'Remember Me']) }} </label>
        </div>
        <button type="submit" class="custom-login-signup-css ">
            <a class="nav-link" href="{{ route('register') }}"> {{ app('googleTranslator', ['string' => 'Register']) }} </a>
        </button>
        <button type="submit" class="custom-login-signup-css ">
            {{ app('googleTranslator', ['string' => 'Login']) }}
        </button>
    </form>
    <div class="text-center custom-google-facrbook-login center-block ">
        <div class="mb-2">
            <a class="" href="{{ route('google.page') }}">
                <button type="submit" class="p-2 custom-google-login-signup btn-block"><span class="bi bi-google"></span>{{ GoogleTranslate::trans('Google Login', app()->getLocale()) }}</button>
            </a>
        </div>
        {{--  <div>
            <a class="" href="{{ route('linkedin.page') }}">
                <button type="submit" class="p-2 custom-linkedin-login-signup btn-block"><span class="bx bxl-linkedin bx-linkedin"></span>{{ GoogleTranslate::trans('LinkedIn Login', app()->getLocale()) }}</button>
            </a>
        </div>  --}}
    </div>
</div>
