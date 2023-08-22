<x-guest-layout>
    <style>
        .form-container{
            width: 40%;
            margin:auto;
        }
    </style>
    <div class="container">
        <div class="form-container ">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                    <div class="my-2">
                    <label for="email" :value="__('Email')">Email</label>
                    <input type="email" name="email" id="email"  class="form-control" value="{{old('email')}}" required  autofocus autocomplete="username">
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
                    <div class="my-2">
                    <label  for="password" :value="__('Password')" >Password</label>
                    <input type="password" id="password" class="form-control"  name="password" required  autocomplete="current-password">
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>
                    <div class="my-2">
                    <label class="form-check-label"><input type="checkbox"> Remember me</label>
                    </div>
                <button type="submit" class="btn btn-primary ">Login</button>
                <button type="submit" class="btn btn-primary "><a href="{{route('register')}}"> Register </a></button>
            </form>
        </div>
    </div>
</x-guest-layout>
