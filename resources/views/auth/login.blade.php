<x-guest-layout>
    <div class="container">
        <div class="form-container">
            <h2 class="text-center standard-heading-css">Unlock Your Dashboard</h2>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="my-2 mb-2">
                    <label for="email" class="mt-2" :value="__('Email')">Email</label>
                    <input type="email" name="email" id="email" class="form-control mt-2 mb-2" value="{{ old('email') }}" required autofocus autocomplete="username">
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
                <div class="my-2 mb-2">
                    <label for="password" class="mt-2" :value="__('Password')">Password</label>
                    <input type="password" id="password" class="form-control mt-2" name="password" required autocomplete="current-password">
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>
                <div class="my-2 mb-2">
                    <label class="form-check-label mt-2" class="mt-2"><input type="checkbox"> remember me </label>
                </div>
                <button type="submit" class="custom-login-signup-css ">
                    <a class="nav-link" href="{{ route('register') }}"> Register </a>
                </button>
                <button type="submit" class="custom-login-signup-css ">
                    Login
                </button>
            </form>
        </div>
    </div>
</x-guest-layout>
