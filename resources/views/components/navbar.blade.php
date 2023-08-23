<nav class="navbar navbar-expand-lg navbar-light " id="navbarManu">
    <div class="container ">
        <a class="navbar-brand text-light" href="/">Logo Here</a>
        <button class="navbar-toggler text-light" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbar-supported-content" aria-controls="navbar-supported-content" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon text-light"></span>
        </button>
        <div class="collapse navbar-collapse text-light" id="navbar-supported-content">
            <ul class="navbar-nav ms-auto mt-4 custom-navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Templates</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">More Services</a>
                    &nbsp;&nbsp;&nbsp;
                    <!-- Check if the user is authenticated  -->
                    @if(Auth::check())
                        <!-- If the user is authenticated, display the Logout button  -->
                <li class="nav-item custom-dropdown ">
                    <a class="nav-link my-account-custom-css" href="#" style="">
                        <span> My Account </span> </a>
                    <ul class="dropdown-content ">
                        <li class="">
                            <a href="{{ route('dashboard') }}">
                                Dashboard
                            </a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a class="" href="{{ route('logout') }}" onclick="event.preventDefault();
                                        this.closest('form').submit();">
                                    Log Out
                                </a>
                            </form>
                        </li>
                    </ul>
                </li>
            @else
                <!-- If the user is not authenticated, you can display a Login or Register link -->
                <li class="nav-item ">
                    <a class="nav-link my-account-custom-css" href="{{ route('login') }}">
                        <span> Sign up </span> </a>
                </li>
                @endif
            </ul>
        </div>
    </div>
</nav>