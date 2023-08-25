<x-guest-layout>
    <div class="container">
        <div class="form-container ">
            <h2 class="text-center standard-heading-css">Please Book Your Self</h2>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="mt-4">
                    <label for="name" :value="__('Name')">Name</label>
                    <input type="name" name="name" id="name" class="form-control" value="{{ old('name') }}" required autofocus autocomplete="username">
                    <x-input-error :messages="$errors->get('name')" class="mt-2 " />
                </div>
                <div class="mt-4">
                    <label for="email" :value="__('Email')">Email</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required autofocus autocomplete="username">
                    <x-input-error :messages="$errors->get('email')" class="mt-2 " />
                </div>
                <div class="mt-4">
                    <label for="password" :value="__('Password')">Password</label>
                    <input type="password" id="password" class="form-control" name="password" required autocomplete="current-password">
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>
                <div class="mt-4">
                    <label for="password_confirmation" :value="__('Confirm Password')">Confirm Password</label>
                    <input type="password" id="password_confirmation" class="form-control" type="password" name="password_confirmation" required autocomplete="new-password">
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>
                <div class="mt-4">
                    <label class="form-check-label"><input type="checkbox"> remember me</label>
                </div>
                <button type="submit" class="custom-login-signup-css">
                    <a class="nav-link" href="{{ route('login') }}"> Login </a>
                </button>
                <button type="submit" class="custom-login-signup-css flex float-end ">
                    Register
                </button>
            </form>
        </div>
    </div>
</x-guest-layout>
