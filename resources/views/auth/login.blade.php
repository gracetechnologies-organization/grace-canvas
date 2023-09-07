<x-guest-layout>
    <div class="container">
        <div class="form-container">
            <h2 class="text-center standard-heading-css">{{ GoogleTranslate::trans('Unlock Your Dashboard', app()->getLocale()) }}</h2>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="my-2 mb-2">
                    <label for="email" class="mt-2" :value="__('Email')">Email {{ GoogleTranslate::trans('Email', app()->getLocale()) }}</label>
                    <input type="email" name="email" id="email" class="mt-2 mb-2 form-control" value="{{ old('email') }}" required autofocus autocomplete="username">
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
                <div class="my-2 mb-2">
                    <label for="password" class="mt-2" :value="__('Password')">{{ GoogleTranslate::trans('Password', app()->getLocale()) }}</label>
                    <input type="password" id="password" class="mt-2 form-control" name="password" required autocomplete="current-password">
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>
                <div class="my-2 mb-2">
                    <label class="mt-2 form-check-label" class="mt-2"><input type="checkbox">{{ GoogleTranslate::trans('Remember Me', app()->getLocale()) }} </label>
                </div>
                <button type="submit" class="custom-login-signup-css ">
                    <a class="nav-link" href="{{ route('register') }}">{{ GoogleTranslate::trans('Register', app()->getLocale()) }}</a>
                </button>
                <button type="submit" class="custom-login-signup-css ">
                    {{ GoogleTranslate::trans('Login', app()->getLocale()) }}
                </button>
            </form>
            {{--  <div class="text-center custom-google-facrbook-login center-block ">
                <div class="mb-2">
                    <a class="" href="{{ route('google.page') }}">
                        <button type="submit" class="p-2 custom-google-login-signup btn-block"><span class="bi bi-google"></span>{{ GoogleTranslate::trans('Google Login', app()->getLocale()) }}</button>
                    </a>
                </div>
                <div>
                    <a class="" href="#">
                        <button type="submit" class="p-2 custom-linkedin-login-signup btn-block"><span class="bx bxl-linkedin bx-linkedin"></span>{{ GoogleTranslate::trans('LinkedIn Login', app()->getLocale()) }}</button>
                    </a>
                </div>
            </div>  --}}
        </div>
    </div>

</x-guest-layout>

