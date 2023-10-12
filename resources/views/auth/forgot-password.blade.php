<x-guest-layout>
        <div class="form-container reset-password">
            <div class="row">
                <div class="col-lg-12 col-md-8 col-sm-12">
                    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                        <div class="mb-4  text-gray-600">
                            {{strtoupper('Just let us know your email address and we will email you a password reset link') }}
                        </div>
                        {{-- <auth-session-status class="mb-4" :status="session('status')" /> --}}
                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf
                            <div class="my-2 mb-2">
                                <label for="email" class="mt-2" :value="__('Email')"> {{ app('googleTranslator', ['string' => 'Email']) }} </label>
                                <input type="email" name="email" id="email" class="mt-2 mb-2 form-control" value="{{ old('email') }}" required autofocus autocomplete="username">
                                <x-input-error :messages="$errors->get('email')" class="mt-2 custom-error-color" />
                                    <style>
                                        .custom-error-color{
                                            color: red;
                                        }
                                    </style>
                            </div>
                            <div class="flex items-center">
                                <button class="btn btn-success">
                                    Email Password Reset Link
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</x-guest-layout>
