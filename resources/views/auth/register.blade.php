<x-guest-layout>
    <style>
        .form-container{
            width: 40%;
            margin:auto;
        }
    </style>
    <div class="container">
        <div class="form-container ">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="mt-4">
                    <label for="name" :value="__('Name')">Name</label>
                    <input type="name" name="name" id="name"  class="form-control" value="{{old('name')}}" required  autofocus autocomplete="username">
                    <x-input-error :messages="$errors->get('name')" class="mt-2 " />
                    </div>
                    <div class="mt-4">
                    <label for="email" :value="__('Email')">Email</label>
                    <input type="email" name="email" id="email"  class="form-control" value="{{old('email')}}" required  autofocus autocomplete="username">
                    <x-input-error :messages="$errors->get('email')" class="mt-2 " />
                    </div>
                    <div class="mt-4">
                    <label  for="password" :value="__('Password')" >Password</label>
                    <input type="password" id="password" class="form-control"  name="password" required  autocomplete="current-password">
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>
                    <div class="mt-4">
                    <label  for="password_confirmation" :value="__('Confirm Password')" >Confirm Password</label>
                    <input type="password" id="password_confirmation" class="form-control" type="password"
                            name="password_confirmation" required autocomplete="new-password">
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>
                    <div class="mt-4">
                    <label class="form-check-label"><input type="checkbox"> Remember me</label>
                    </div>
                <button type="submit" class="btn btn-primary ">Login</button>
                <button type="submit" class="btn btn-primary "> Register</button>
            </form>
        </div>
    </div>
</x-guest-layout>
