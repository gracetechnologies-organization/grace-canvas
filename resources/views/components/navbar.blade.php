<nav class="navbar navbar-expand-lg navbar-light" id="navbarManu">
    <div class="container">
        <a class="navbar-brand text-light" href="{{ route('home') }}">Grace Canvas</a>
        <button class="navbar-toggler text-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-supported-content" aria-controls="navbar-supported-content" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon text-light"></span>
        </button>
        <div class="collapse navbar-collapse text-light mb-4" id="navbar-supported-content">
            <ul class="navbar-nav ms-auto mt-4 custom-navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">Home</a>
                </li>
                {{-- <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                </li> --}}
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('templates.resume') }}">Resume Templates</a>
                </li>
                {{-- <li class="nav-item">
                    <a class="nav-link" href="#">More Services</a>
                </li> --}}

                <!-- Check if the user is authenticated  -->
                @if (Auth::check())
                    <!-- If the user is authenticated, display the My Account button  -->
                    <li class="nav-item custom-dropdown">
                        <a class="nav-link my-account-custom-btn" href="#">
                            <span> My Account </span>
                        </a>
                        <ul class="dropdown-content">
                            <li>
                                <a href="{{ route('dashboard') }}">
                                    Dashboard
                                </a>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                        this.closest('form').submit();">
                                        Log Out
                                    </a>
                                </form>
                            </li>
                        </ul>
                    </li>
                @else
                    <!-- If the user is not authenticated, you can display a Login or Register link -->
                    <li class="nav-item">
                        <a class="nav-link my-account-custom-btn" href="{{ route('register') }}">
                            <span>Sign Up</span>
                        </a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
