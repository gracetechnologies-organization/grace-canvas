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
                <li class="nav-item dropdown ">
                    <a class="nav-link " href="#"
                        style="background-color:#F9F9F9;color:black;width:10.125rem;height:3.438rem;border-radius:0.625rem;padding:0.625rem 1rem 1rem 1rem; margin-top:-0.5rem;line-height: normal;font-style: normal;font-size: 1.30rem;font-weight: 500; font-family: Poppins;">
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
                    <a class="nav-link" href="{{ route('login') }}"
                        style="background-color:#F9F9F9;color:black;width:9.125rem;height:3.438rem;border-radius:0.625rem;padding:0.625rem 0rem 1rem 2rem; margin-top:-0.5rem;line-height: normal;font-style: normal;font-size: 1.25rem;font-weight: 500; font-family: Poppins;">
                        <span style=""> Sign up </span> </a>
                </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
<style>
    .dropdown {
        position: relative;
        display: inline-block;
    }
    
    .dropdown-content {
        border-radius:0px 0px 15px 15px;
        display: none;
        margin-top:-0.5rem;
        position: absolute;
        background-color: #F9F9F9;
        min-width: 162px;
        /* box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2); */
        padding:  20px 10px 10px 20px;
        /* z-index: 1; */
    }
    
    .dropdown-content li {
        list-style-type: none;
    }
    
    .dropdown-content li a {
        text-align:center;
        text-decoration: none;
        color: black;
        font-size: 1.15rem;
        font-family: Poppins;
        font-style: normal;
        font-weight: 500;
        line-height: 2;
    }
    
    .dropdown:hover .dropdown-content {
        display: block;
        color: blue;
    }
</style>


