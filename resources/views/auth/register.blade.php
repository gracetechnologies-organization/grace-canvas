<x-guest-layout>
    <div class="container">
        <div class="form-container ">
            <h2 class="text-center standard-heading-css">{{ GoogleTranslate::trans('Please Book Your Self', app()->getLocale()) }}</h2>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="mt-4">
                    <label for="name" :value="__('Name')">{{ GoogleTranslate::trans('Name', app()->getLocale()) }}</label>
                    <input type="name" name="name" id="name" class="form-control" value="{{ old('name') }}" required autofocus autocomplete="username">
                    <x-input-error :messages="$errors->get('name')" class="mt-2 " />
                </div>
                <div class="mt-4">
                    <label for="email" :value="__('Email')">{{ GoogleTranslate::trans('Email', app()->getLocale()) }}</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required autofocus autocomplete="username">
                    <x-input-error :messages="$errors->get('email')" class="mt-2 " />
                </div>
                <div class="mt-4">
                    <label for="password" :value="__('Password')">{{ GoogleTranslate::trans('Password', app()->getLocale()) }}</label>
                    <input type="password" id="password" class="form-control" name="password" required autocomplete="current-password">
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>
                <div class="mt-4">
                    <label for="password_confirmation" :value="__('Confirm Password')">{{ GoogleTranslate::trans('Confirm Password', app()->getLocale()) }}</label>
                    <input type="password" id="password_confirmation" class="form-control" type="password" name="password_confirmation" required autocomplete="new-password">
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>
                <div class="mt-4">
                    <label class="form-check-label"><input type="checkbox">{{ GoogleTranslate::trans('Remember Me', app()->getLocale()) }}</label>
                </div>
                <button type="submit" class="custom-login-signup-css">
                    <a class="nav-link" href="{{ route('login') }}"> {{ GoogleTranslate::trans('Login', app()->getLocale()) }} </a>
                </button>
                <button type="submit" class="flex custom-login-signup-css float-end ">
                    {{ GoogleTranslate::trans('Register', app()->getLocale()) }}
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
                        <button type="submit" class="p-2 custom-linkedin-login-signup btn-block"><span class="bx bxl-linkedin bx-linkedin"></span>{{ GoogleTranslate::trans('LinkedIn login', app()->getLocale()) }}</button>
                    </a>
                </div>
            </div>  --}}
        </div>
    </div>
</x-guest-layout>
