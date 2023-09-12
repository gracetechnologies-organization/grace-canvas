<div class="form-container">
    <h2 class="text-center standard-heading-css">{{ app('googleTranslator', ['string' => 'Please Book Your Self']) }}</h2>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="mt-4">
            <label for="name" :value="__('Name')"> {{ app('googleTranslator', ['string' => 'Name']) }} </label>
            <input type="name" name="name" id="name" class="form-control" value="{{ old('name') }}" required autofocus autocomplete="username">
            <x-input-error :messages="$errors->get('name')" class="mt-2 " />
        </div>
        <div class="mt-4">
            <label for="email" :value="__('Email')"> {{ app('googleTranslator', ['string' => 'Email']) }} </label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required autofocus autocomplete="username">
            <x-input-error :messages="$errors->get('email')" class="mt-2 " />
        </div>
        <div class="mt-4">
            <label for="password" :value="__('Password')"> {{ app('googleTranslator', ['string' => 'Password']) }} </label>
            <input type="password" id="password" class="form-control" name="password" required autocomplete="current-password">
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>
        <div class="mt-4">
            <label for="password_confirmation" :value="__('Confirm Password')"> {{ app('googleTranslator', ['string' => 'Confirm Password']) }} </label>
            <input type="password" id="password_confirmation" class="form-control" type="password" name="password_confirmation" required autocomplete="new-password">
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>
        <div class="mt-4">
            <label class="form-check-label"><input type="checkbox"> {{ app('googleTranslator', ['string' => 'Remember Me']) }} </label>
        </div>
        <button type="submit" class="custom-login-signup-css">
            <a class="nav-link" href="{{ route('login') }}"> {{ app('googleTranslator', ['string' => 'Login']) }} </a>
        </button>
        <button type="submit" class="flex custom-login-signup-css float-end ">
            {{ app('googleTranslator', ['string' => 'Register']) }}
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