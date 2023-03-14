@extends('layouts.app')

@section('page-title', __('My Profile'))
@section('page-heading', __('My Profile'))

@section('breadcrumbs')
    <li class="breadcrumb-item active">
        @lang('My Profile')
    </li>
@stop

@section('content')

    <!-- Dashboard Section start -->
    <section class="dashboard-section body-collapse account psay stesp exchange">
        
        <div class="overlay pt-120">
            <div class="container-fruid">
                <div class="main-content">
                    <div class="row">
                        
                        <div class="col-xxl-3 col-xl-4 col-md-6">
                            <div class="owner-details">
                                
                                <div class="owner-action">
                                   
                                  <div class="profile-area">
                                   
                                    <div class="name-area">
                                        <h6>{{$user->username}}</h6>
                                        <span class="badge badge-lg bg-{{ $user->present()->labelClass }}">
                                            {{ trans("app.status.{$user->status}") }}
                                        </span>
                                    </div>
                                </div>
                                <div class="owner-info">
                                    <ul>
                                        <li>
                                            <p>Account ID:</p>
                                            <span class="mdr">{{$user->accountid}}</span>
                                        </li>
                                        <li>
                                            <p>Joined:</p>
                                            <span class="mdr">{{ $user->created_at->format(config('app.date_format')) }}</span>
                                        </li> 
                                    </ul>
                                </div>

                                    <a href="javascript:void(0)">
                                        <img src="{{url('public/backend/images/icon/logout.png')}}" alt="image">
                                        Logout
                                    </a>
                                    <a href="javascript:void(0)" class="delete">
                                        <img src="{{url('public/backend/images/icon/delete-2.png')}}" alt="image">
                                        Delete Account
                                    </a>
                                </div>

                            </div>
                        </div>
                        <div class="col-xxl-9 col-xl-8">
                            <div class="tab-main">


                                @include('partials.messages')
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="account-tab" data-bs-toggle="tab"
                                            data-bs-target="#account" type="button" role="tab" aria-controls="account"
                                            aria-selected="true">Account</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="security-tab" data-bs-toggle="tab"
                                            data-bs-target="#security" type="button" role="tab" aria-controls="security"
                                            aria-selected="false">Security</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="avatar-tab" data-bs-toggle="tab"
                                            data-bs-target="#avatar" type="button" role="tab" aria-controls="avatar"
                                            aria-selected="false">Avatar</button>
                                    </li>
                                     
                                </ul>
                                <div class="tab-content mt-40">
                                    <div class="tab-pane fade show active" id="account" role="tabpanel"
                                        aria-labelledby="account-tab">
                                        <form action="{{ route('profile.update.details') }}" method="POST" id="details-form">
                                            @method('PUT')
                                            @csrf
                                            @include('user.partials.details', ['profile' => true])
                                        </form>
                                    </div>
                                    <div class="tab-pane fade" id="avatar" role="tabpanel"
                                        aria-labelledby="avatar-tab">
                                        <form action="{{ route("profile.update.avatar") }}"
                                        method="POST"
                                        id="avatar-form"
                                        enctype="multipart/form-data">                  
                                          @csrf
                                          @include('user.partials.avatar', ['updateUrl' => route('profile.update.avatar-external')])
                                        </form>
                                        
                                    </div>
                                    <div class="tab-pane fade" id="security" role="tabpanel"
                                        aria-labelledby="security-tab">
                                        @if (setting('2fa.enabled'))
                                        <div class="single-content authentication d-flex align-items-center justify-content-between">
                                            <div class="left">
                                                <h5>Two Factor Authentication</h5>
                                                <p>Two-Factor Authentication (2FA) can be used to help protect your account</p>
                                            </div>
                                            <div class="right">
                                                <button>Enable</button>
                                            </div>
                                        </div>

                                            <div class="single-setting">
                                                 <div class="tab-pane fade px-2" id="2fa" role="tabpanel" aria-labelledby="nav-profile-tab">
                                                    <?php $route = Authy::isEnabled($user) ? 'disable' : 'enable'; ?>

                                                    <form action="{{ route("two-factor.{$route}") }}" method="POST" id="two-factor-form">
                                                        @csrf
                                                        <input type="hidden" name="user" value="{{ $user->id }}">
                                                        @include('user.partials.two-factor')
                                                    </form>
                                                </div>
                                            </div>
                                         @endif
                                        
                                        <div class="change-pass mb-40">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <h5>Change Password</h5>
                                                    <p>You can always change your password for security reasons or reset your password in case you forgot it.</p>
                                                    <a href="javascript:void(0)">Forgot password?</a>
                                                </div>
                                                <div class="col-sm-6">
                                                    <form action="{{ route('profile.update.login-details') }}"
                                                    method="POST"
                                                    id="login-details-form">
                                                    @method('PUT')
                                                    @csrf
                                                    @include('user.partials.auth')
                                                </form>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        {{--
                                        <div class="single-content additional-security">
                                            <h5>Additional security</h5>
                                            <div class="single-setting">
                                                <div class="left">
                                                    <h6>SMS recovery</h6>
                                                    <p>Number ending with 1234</p>
                                                </div>
                                                <div class="right">
                                                    <button class="active">Disable SMS</button>
                                                </div>
                                            </div>
                                            <div class="single-setting">
                                                <div class="left">
                                                    <h6>Autheticator App</h6>
                                                    <p>Google Authenticator</p>
                                                </div>
                                                <div class="right">
                                                    <button>Configure</button>
                                                </div>
                                            </div>
                                            <div class="single-setting">
                                                <div class="left">
                                                    <h6>SSL Certificate</h6>
                                                    <p>Secure Sockets Layer</p>
                                                </div>
                                                <div class="right">
                                                    <button>Configure</button>
                                                </div>
                                            </div>                                            
                                        </div>
                                        --}}
                                         
                                    </div>
                                     
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Dashboard Section end --> 
</section>
 
@stop

@section('scripts')
    {!! HTML::script('assets/js/as/btn.js') !!}
    {!! HTML::script('assets/js/as/profile.js') !!}
    {!! JsValidator::formRequest('Vanguard\Http\Requests\User\UpdateDetailsRequest', '#details-form') !!}
    {!! JsValidator::formRequest('Vanguard\Http\Requests\User\UpdateProfileLoginDetailsRequest', '#login-details-form') !!}

    @if (setting('2fa.enabled'))
        {!! JsValidator::formRequest('Vanguard\Http\Requests\TwoFactor\EnableTwoFactorRequest', '#two-factor-form') !!}
    @endif
@stop
