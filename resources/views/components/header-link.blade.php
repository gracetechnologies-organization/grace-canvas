<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="{{ asset('storage/icons/canvas_icon.webp') }}" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet" />

    <!-- Core theme CSS (includes Bootstrap v5.2.3)-->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/loginSignUp.css') }}" rel="stylesheet" />
    @if (Route::current()->uri == '/') <link href="{{ asset('css/homePage.css') }}" rel="stylesheet" /> @endif
    @if (Route::current()->uri == 'templates/resume')<link href="{{ asset('css/homePage.css') }}" rel="stylesheet" /> <link href="{{ asset('css/resumeTempletes.css') }}" rel="stylesheet" /> @endif
    <!-- Boxicons -->
    <link href="{{ asset('fonts/boxicons.css') }}" rel="stylesheet">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    <!-- @vite(['resources/css/app.css', 'resources/js/app.js']) -->

    <!-- Styles -->
    @livewireStyles
