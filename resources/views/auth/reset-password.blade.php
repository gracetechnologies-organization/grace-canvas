<x-guest-layout>
    <div class="form-container reset-password">
        <div class="row">
            <form method="POST" action="{{ route('password.store') }}">
                @csrf

                <!-- Password Reset Token -->
                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <!-- Email Address -->
                <div>
                    <label for="email" class="mt-2" :value="__('Email')"> {{ app('googleTranslator', ['string' => 'Email']) }} </label>
                    <input type="email" name="email" id="email" class="mt-2 mb-2 form-control" value="{{ old('email', $request -> email) }}" required autofocus autocomplete="username">
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <label for="password" class="mt-2" :value="__('Email')"> {{ app('googleTranslator', ['string' => 'Password']) }} </label>
                    <input type="password" name="password" id="password" class="mt-2 mb-2 form-control" required autofocus autocomplete="password">
                    <error :messages="$errors - > get('password')" class="mt-2" />
                </div>

                <!-- Confirm Password -->
                <div class="mt-4">
                    <label for="password_confirmation" class="mt-2" :value="__('Confirm Password')"> {{ app('googleTranslator', ['string' => 'Confirm Password']) }} </label>
                    <input type="password_confirmation" name="password_confirmation" id="password_confirmation" class="mt-2 mb-2 form-control" required autofocus autocomplete="password_confirmation">
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <button class="btn btn-success">
                        {{ __('Reset Password') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
