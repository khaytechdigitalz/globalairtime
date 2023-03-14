<div class="sidebar-wrapper">
    <div class="close-btn">
        <i class="fa-solid fa-xmark"></i>
    </div>
    <div class="sidebar-logo">
        <a href="{{url('/')}}">
            <img src="{{ url('public/assets/img/vanguard-logo.png') }}" width="100" class="logo" alt="logo">
        </a>
    </div>
    <ul>
        @if (app('impersonate')->isImpersonating())
        <li class="">
            <a href="{{ route('impersonate.leave') }}">
                <img src="{{url('public/backend/images/icon/dashboard.png')}}" alt="Dashboard"> <span>Exit</span>
            </a>
        </li> 
        @endif
        @foreach (\Vanguard\Plugins\Vanguard::availablePlugins() as $plugin)
        @include('partials.sidebar.items', ['item' => $plugin->sidebar()])
        @endforeach
         
    </ul>
    <ul class="bottom-item">
        @if (config('session.driver') == 'database')

        <li>
            <a href="{{ route('profile.sessions') }}">
                <img src="{{url('public/backend/images/icon/transactions.png')}}" alt="@lang('My Sessions')"> <span>@lang('My Sessions')</span>
            </a>
        </li> 
        @endif
        <li>
            <a href="{{ route('profile.activity') }}">
                <img src="{{url('public/backend/images/icon/exchange.png')}}" alt="@lang('My Activities')"> <span>@lang('My Activities')</span>
            </a>
        </li> 
        
        <li>
            <a href="{{ route('auth.logout') }}">
                <img src="{{url('public/backend/images/icon/quit.png')}}" alt="Quit"> <span>Logout</span>
            </a>
        </li>
    </ul>
    <div class="pt-120">
        <div class="invite-now">
            <div class="img-area">
                <img src="{{url('public/frontend/images/invite.png')}}" alt="Image">
            </div>
            <p>Invite your friend and get $25</p>
            <a href="javascript:void(0)" class="cmn-btn">Invite Now</a>
        </div>
    </div>
</div>
{{--
<nav class="col-md-2 sidebar">
    <div class="user-box text-center pt-5 pb-3">
        <div class="user-img">
            <img src="{{ auth()->user()->present()->avatar }}"
                 width="90"
                 height="90"
                 alt="user-img"
                 class="rounded-circle img-thumbnail img-responsive">
        </div>
        <h5 class="my-3">
            <a href="{{ route('profile') }}">{{ auth()->user()->present()->nameOrEmail }}</a>
        </h5>

        <ul class="list-inline mb-2">
            <li class="list-inline-item">
                <a href="{{ route('profile') }}" title="@lang('My Profile')">
                    <i class="fas fa-cog"></i>
                </a>
            </li>

            <li class="list-inline-item">
                <a href="{{ route('auth.logout') }}" class="text-custom" title="@lang('Logout')">
                    <i class="fas fa-sign-out-alt"></i>
                </a>
            </li>
        </ul>
    </div>

    <div class="sidebar-sticky">
        <ul class="nav flex-column">
            @foreach (\Vanguard\Plugins\Vanguard::availablePlugins() as $plugin)
                @include('partials.sidebar.items', ['item' => $plugin->sidebar()])
            @endforeach
        </ul>
    </div>
</nav>
--}}

