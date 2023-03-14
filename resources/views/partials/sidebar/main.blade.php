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


