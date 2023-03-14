
    <!-- header-section start -->
    <header class="header-section">
        <div class="overlay">
            <div class="container">
                <div class="row d-flex header-area">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <a class="navbar-brand" href="{{url('/')}}">
                            <img src="{{ url('public/assets/img/vanguard-logo.png') }}" width="100" class="logo" alt="logo">
                        </a>
                        <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbar-content">
                            <i class="fas fa-bars"></i>
                        </button>
                        <div class="collapse navbar-collapse justify-content-end" id="navbar-content">
                            <ul class="navbar-nav mr-auto mb-2 mb-lg-0">
                                
                                <li class="nav-item main-navbar">
                                    <a class="nav-link" href="{{route('home')}}" data-bs-auto-close="outside">Home</a>
                                </li>
                                <li class="nav-item main-navbar">
                                    <a class="nav-link" href="{{route('home')}}" data-bs-auto-close="outside">About</a>
                                </li>

                                <li class="nav-item main-navbar">
                                    <a class="nav-link" href="{{route('home')}}" data-bs-auto-close="outside">Contact</a>
                                </li>
                                 
                            </ul>
                            <div class="right-area header-action d-flex align-items-center max-un">
                                @auth
                                <a href="{{ route('auth.logout') }}" class="login">Logout</a>
                                <a href="{{route('dashboard')}}" class="cmn-btn">Account
                                    <i class="icon-d-right-arrow-2"></i>
                                </a>
                                @else
                                <a href="{{url("login")}}" class="login">Login</a>
                                <a href="{{url("register")}}" class="cmn-btn">Sign Up
                                    <i class="icon-d-right-arrow-2"></i>
                                </a>
                                @endauth
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- header-section end -->
