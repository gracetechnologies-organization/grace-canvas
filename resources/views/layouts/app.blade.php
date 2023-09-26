<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('components.header-link')
    @livewireStyles
</head>

<body class="font-sans antialiased">
    {{-- <x-banner /> --}}
    @include('components.navbar')
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

    {{-- @stack('modals') --}}
    @if (session('login_error'))
        <div class="modal fade show madel" id="customModal" tabindex="-1" aria-labelledby="customModalLabel"
            aria-hidden="true" style="display: block;">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        {{ session('login_error') }}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Close</button>
                        <a href="{{route('login') }}" class="btn btn-primary">Go To Login</a>
                    </div>
                </div>
            </div>
        </div>
    @endif
    @if (session('not_subscribed_error'))
        <div class="modal fade show madel" id="customModal" tabindex="-1" aria-labelledby="customModalLabel"
            aria-hidden="true" style="display: block;">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        {{ session('not_subscribed_error') }}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Close</button>
                        <a href="{{route('subscription') }}" class="btn btn-success">Continue With Plan </a>
                    </div>
                </div>
            </div>
        </div>
    @endif
    @include('components.footer')
    @include('scripts')
    @livewireScripts
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            @if (session('login_error'))
                $('#customModal').modal('show');
            @endif
            @if (session('not_subscribed_error'))
                $('#customModal').modal('show');
            @endif
        });
    </script>
</body>

</html>
