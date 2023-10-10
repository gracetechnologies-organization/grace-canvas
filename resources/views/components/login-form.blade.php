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
            <div class=" float-start"><label for="password" class="mt-2" :value="__('Password')"> {{ app('googleTranslator', ['string' => 'Password']) }} </label></div>
            <div class=" float-end">
                <label for="password" class="mt-2" :value="__('Password')">
                @if (Route::has('password.request'))
                 <a href="{{ route('password.request') }}">{{ app('googleTranslator', ['string' => 'Forget Your Password ?']) }} </a>
                 @endif
                </label></div>
            <input type="password" id="password" class="mt-2 form-control" name="password" required autocomplete="current-password">
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>
        <div class="my-2 mb-2">
            <label class="mt-2 form-check-label" class="mt-2">
                <input type="checkbox" required> {{ app('googleTranslator', ['string' => 'Remember Me']) }} </label>
        </div>
        <button type="submit" class="custom-login-signup-css ">
            <a class="nav-link" href="{{ route('register') }}"> {{ app('googleTranslator', ['string' => 'Register']) }} </a>
        </button>
        <button type="submit" class="custom-login-signup-css ">
            {{ app('googleTranslator', ['string' => 'Login']) }}
        </button>
    </form>
    @include('components.social-logins')
</div>
