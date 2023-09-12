<nav class="navbar navbar-expand-lg navbar-light" id="navbarManu">
    <div class="container">
        <a class="navbar-brand text-light" href="{{ route('home') }}">
            {{ app('googleTranslator', ['string' => 'Grace Canvas']) }}
        </a>
        <button class="navbar-toggler text-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-supported-content" aria-controls="navbar-supported-content" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon text-light"></span>
        </button>
        <div class="mb-4 collapse navbar-collapse text-light" id="navbar-supported-content">
            <ul class="mt-4 navbar-nav ms-auto custom-navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">{{ app('googleTranslator', ['string' => 'Home']) }}</a>
                </li>
                {{-- <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                </li> --}}
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('templates.resume') }}">{{ app('googleTranslator', ['string' => 'Resume Templates']) }}</a>
                </li>
                {{-- <li class="nav-item">
                    <a class="nav-link" href="#">More Services</a>
                </li> --}}

                <!-- Check if the user is authenticated  -->
                @if (Auth::check())
                    <!-- If the user is authenticated, display the My Account button  -->
                    <li class="nav-item custom-dropdown">
                        <a class="nav-link my-account-custom-btn" href="#">
                            <span>{{ app('googleTranslator', ['string' => 'My Account']) }}</span>
                        </a>
                        <ul class="dropdown-content">
                            <li>
                                <a href="{{ route('user.dashboard') }}">
                                    {{ app('googleTranslator', ['string' => 'Dashboard']) }}
                                </a>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                        this.closest('form').submit();">
                                        {{ app('googleTranslator', ['string' => 'Log Out']) }}
                                    </a>
                                </form>
                            </li>
                        </ul>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link my-account-custom-btn" href="{{ route('register') }}">
                            <span>
                                {{ app('googleTranslator', ['string' => 'Sign Up']) }}
                            </span>
                        </a>
                    </li>
                @endif
                <li class="nav-item custom-select-button">
                    <select class="changeLang my-account-custom-btn" onchange="changeLanguage(this)">
                        <option value="en" {{ session()->get('locale') == 'en' ? 'selected' : '' }}>English</option>
                        <option value="zh" {{ session()->get('locale') == 'zh' ? 'selected' : '' }}>China</option>
                        <option value="fr" {{ session()->get('locale') == 'fr' ? 'selected' : '' }}>France</option>
                        <option value="es" {{ session()->get('locale') == 'es' ? 'selected' : '' }}>Spanish</option>
                        <option value="ur" {{ session()->get('locale') == 'ur' ? 'selected' : '' }}>Urdu</option>
                        <option value="de" {{ session()->get('locale') == 'de' ? 'selected' : '' }}>Danish</option>
                        <option value="de" {{ session()->get('locale') == 'de' ? 'selected' : '' }}>German</option>
                        <option value="id" {{ session()->get('locale') == 'id' ? 'selected' : '' }}>Indonasiaon</option>
                        <option value="it" {{ session()->get('locale') == 'it' ? 'selected' : '' }}>Italian</option>
                        <option value="nl" {{ session()->get('locale') == 'nl' ? 'selected' : '' }}>Dutch</option>
                        <option value="no" {{ session()->get('locale') == 'no' ? 'selected' : '' }}>Norwagian</option>
                        <option value="pl" {{ session()->get('locale') == 'pl' ? 'selected' : '' }}>Polish</option>
                        <option value="pt" {{ session()->get('locale') == 'pt' ? 'selected' : '' }}>Portuguese</option>
                        <option value="sv" {{ session()->get('locale') == 'sv' ? 'selected' : '' }}>Swedish</option>
                        <option value="ru" {{ session()->get('locale') == 'ru' ? 'selected' : '' }}>Russion</option>
                        <option value="tr" {{ session()->get('locale') == 'tr' ? 'selected' : '' }}>Turkish</option>
                    </select>
                </li>
            </ul>
        </div>
    </div>
</nav>
