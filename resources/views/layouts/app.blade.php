<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('components.header-link')
    @livewireStyles
</head>

<body class="font-sans antialiased">
    @include('components.navbar')

    {{-- @if (session('login_error'))
        @include('components.not-loggedin-error-modal')
    @endif --}}
    @if (session('not_subscribed_error'))
       @include('components.not-subscribed-error-modal')
    @endif

    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white shadow dark:bg-gray-800">
                <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif
        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>

    @include('components.footer')
    @include('scripts')
    @livewireScripts
</body>

</html>
