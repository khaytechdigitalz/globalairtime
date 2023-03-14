
    <!-- header-section start -->
    <header class="header-section body-collapse">
        <div class="overlay">
            <div class="container-fruid">
                <div class="row d-flex header-area">
                    <div class="navbar-area d-flex align-items-center justify-content-between">
                        <div class="sidebar-icon">
                            <img src="{{url('public/backend/images/icon/menu.png')}}" alt="icon">
                        </div>
                        <form action="#" class="flex-fill">
                            <div class="form-group d-flex align-items-center">
                                <img src="{{url('public/backend/images/icon/search.png')}}" alt="icon">
                                <input type="text" placeholder="Type to search...">
                            </div>
                        </form>
                        <div class="dashboard-nav">
                            <div class="single-item language-area">
                                <div class="language-btn">
                                    <img src="{{url('public/backend/images/icon/lang.png')}}" alt="icon">
                                </div>
                                <ul class="main-area language-content"> 
                                    <li class="active">English (US)</li> 
                                </ul>
                            </div>
                            <div class="single-item notifications-area">
                                <div class="notifications-btn">
                                    <img src="{{url('public/backend/images/icon/bell.png')}}" class="bell-icon" alt="icon">
                                </div>
                                <div class="main-area notifications-content">
                                    <div class="head-area d-flex justify-content-between">
                                        <h5>Notifications</h5>
                                        <span class="mdr">4</span>
                                    </div>
                                    <ul>
                                        {{--
                                        <li>
                                            <a href="javascript:void(0)" class="d-flex">
                                                <div class="img-area">
                                                    <img src="{{url('public/backend/images/user-3.png')}}" class="max-un" alt="image">
                                                </div>
                                                <div class="text-area">
                                                    <p class="mdr">You received a payment of <b>$250.00</b> from Goerge
                                                        Michael</p>
                                                    <p class="mdr time-area">Yesterday</p>
                                                </div>
                                            </a>
                                            <i class="fa-solid fa-caret-right"></i>
                                        </li>
                                        --}}
                                    </ul>
                                </div>
                            </div>
                            <div class="single-item user-area">
                                <div class="profile-area d-flex align-items-center">
                                    <span class="user-profile">
                                        <img src="{{ auth()->user()->present()->avatar }}" alt="User">
                                    </span>
                                    <i class="fa-solid fa-sort-down"></i>
                                </div>
                                <div class="main-area user-content">
                                    <div class="head-area d-flex align-items-center">
                                        <div class="profile-img">
                                            <img src="{{url('public/upload/users/')}}/{{ auth()->user()->avatar }}" alt="User">
                                        </div>
                                        <div class="profile-head">
                                            <a href="javascript:void(0)">
                                                <h5>{{ auth()->user()->present()->nameOrEmail }}</h5>
                                                
                                            </a>
                                            <p class="wallet-id">Account ID: {{ auth()->user()->present()->accountid }}</p>
                                        </div>
                                    </div>
                                    <ul>
                                        <li class="border-area">
                                            <a href="{{ route('profile') }}"><i class="fas fa-cog"></i>Settings</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('auth.logout') }}"><i class="fas fa-sign-out"></i>Logout</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    @include('partials.sidebar.main')

                    
                </div>
            </div>
        </div>
    </header>
    <!-- header-section end -->

{{--
<nav class="navbar fixed-top align-items-start navbar-expand-lg pl-0 pr-0 py-0" >

    <div class="navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand mr-0" href="{{ url('/') }}">
            <img src="{{ url('assets/img/vanguard-logo.png') }}" class="logo-lg" height="35" alt="{{ setting('app_name') }}">
            <img src="{{ url('assets/img/vanguard-logo-no-text.png') }}" class="logo-sm" height="35" alt="{{ setting('app_name') }}">
        </a>
    </div>

    <div>
        @if (app('impersonate')->isImpersonating())
            <a href="{{ route('impersonate.leave') }}" class="navbar-toggler text-danger hidden-md">
                <i class="fas fa-user-secret"></i>
            </a>
        @endif

        <button class="navbar-toggler" type="button" id="sidebar-toggle">
            <i class="fas fa-align-right text-muted"></i>
        </button>

        <button class="navbar-toggler mr-3"
                type="button"
                data-toggle="collapse"
                data-target="#top-navigation"
                aria-controls="top-navigation"
                aria-expanded="false"
                aria-label="Toggle navigation">
            <i class="fas fa-bars text-muted"></i>
        </button>
    </div>

    <div class="collapse navbar-collapse" id="top-navigation">
        <div class="row ml-2">
            <div class="col-lg-12 d-flex align-items-left align-items-md-center flex-column flex-md-row py-3">
                <h4 class="page-header mb-0">
                    @yield('page-heading')
                </h4>

                <ol class="breadcrumb mb-0 font-weight-light">
                    <li class="breadcrumb-item">
                        <a href="{{ url('/') }}" class="text-muted">
                            <i class="fa fa-home"></i>
                        </a>
                    </li>

                    @yield('breadcrumbs')
                </ol>
            </div>
        </div>

        <ul class="navbar-nav ml-auto pr-3 flex-row">
            @if (app('impersonate')->isImpersonating())
                <li class="nav-item d-flex align-items-center visible-lg">
                    <a href="{{ route('impersonate.leave') }}" class="btn text-danger">
                        <i class="fas fa-user-secret mr-2"></i>
                        @lang('Stop Impersonating')
                    </a>
                </li>
            @endif

            @hook('navbar:items')

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle"
                   href="#"
                   id="navbarDropdown"
                   role="button"
                   data-toggle="dropdown"
                   aria-haspopup="true"
                   aria-expanded="false">
                    <img src="{{ auth()->user()->present()->avatar }}"
                         width="50"
                         height="50"
                         class="rounded-circle img-thumbnail img-responsive">
                </a>
                <div class="dropdown-menu dropdown-menu-right position-absolute p-0" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item py-2" href="{{ route('profile') }}">
                        <i class="fas fa-user text-muted mr-2"></i>
                        @lang('My Profile')
                    </a>

                    @if (config('session.driver') == 'database')
                        <a href="{{ route('profile.sessions') }}" class="dropdown-item py-2">
                            <i class="fas fa-list text-muted mr-2"></i>
                            @lang('Active Sessions')
                        </a>
                    @endif

                    @hook('navbar:dropdown')

                    <div class="dropdown-divider m-0"></div>

                    <a class="dropdown-item py-2" href="{{ route('auth.logout') }}">
                        <i class="fas fa-sign-out-alt text-muted mr-2"></i>
                        @lang('Logout')
                    </a>
                </div>
            </li>
        </ul>
    </div>
</nav>
--}}
