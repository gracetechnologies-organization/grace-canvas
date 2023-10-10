<div id="sidebar" class="sidebar custom-sidebar-user-dashboard">
    <a href="{{route('user.dashboard.home')}}">
        <i class='bx bxs-home'></i>
        <span class="d-md-inline">{{ app('googleTranslator', ['string' => 'Home']) }}</span>
    </a>
    <a href="{{ route('user.dashboard.subcribtion') }}">
        <i class='bx bxs-planet'></i>
        <span class="d-md-inline">{{ app('googleTranslator', ['string' => 'Subcribtion']) }}</span>
    </a>
    <a href="{{ route('user.dashboard.templates') }}">
        <i class="bx bx-file "></i>
        <span class="d-md-inline">{{ app('googleTranslator', ['string' => 'My Template']) }}</span>
    </a>
    <a href="{{ route('user.dashboard.settings') }}">
        <i class='bx bxs-cog'></i>
        <span class="d-md-inline">{{ app('googleTranslator', ['string' => 'Setting']) }}</span>
    </a>
</div>
