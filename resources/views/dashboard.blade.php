<x-app-layout>
    <x-slot name="header">
        <div class="container">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Wellcome to Grace canvas') }}
        </h2>
        <div class="p-6 text-gray-900">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">

                        <button type="submit" class="btn btn">Log Out</button>
                    </x-responsive-nav-link>
                </form>
                </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

            </div>
        </div>
    </div>
</x-app-layout>
