@extends('layouts.auth')

@section('page-title', trans('Login'))

@section('content')

    <!-- Login Reg start -->
    <section class="login-reg">
        <div class="overlay pt-120">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-xl-6 order-xl-0 order-1">
                        <div class="sec-img d-rtl">
                            <img 
                            style=" width: auto;
                            max-height: 100%;
                            max-width: 100%;"
                            src="{{url('public/frontend/images/login.png')}}" class="max-un" alt="image">
                        </div>
                    </div>
                    <div class="col-xl-5">
                        
                            <div class="text-center">
                                <a href="{{url('/')}}">
                                <img src="{{ url('public/assets/img/vanguard-logo.png') }}" width="100" alt="{{ setting('app_name') }}" height="50">
                                </a>
                            </div>
                            
                        <div class="section-text text-center">
                            <br>
                            <h5 class="sub-title">Log in to Continue</h5>
                           
                        </div>
                        <form role="form" action="<?= url('login') ?>" method="POST" id="login-form" autocomplete="off" class="mt-3">
                            @include('partials.messages')
                            <input type="hidden" value="<?= csrf_token() ?>" name="_token">
                            @if (Request::has('to'))
                                <input type="hidden" value="{{ Request::get('to') }}" name="to">
                            @endif

                            <div class="row">
                                <div class="col-12">
                                    <div class="single-input">
                                        <label for="username" class="sr-only">@lang('Email or Username')</label>
                                        <input type="text"
                                                name="username"
                                                id="username"
                                                placeholder="@lang('Email or Username')"
                                                value="{{ old('username') }}">
                                    </div>
                                    <div class="single-input">
                                        <label for="password" class="sr-only">@lang('Password')</label>
                                        <small><a href="{{route('password.request')}}">Forgot Password ?</a></small>

                                        <input type="password"
                                            name="password"
                                            id="password"
                                            placeholder="@lang('Password')">
                                     </div>
                                    @if (setting('remember_me'))
                                        <div class="custom-control custom-checkbox single-input">
                                            <input type="checkbox" class="custom-control-input" name="remember" id="remember" value="1"/>
                                            <label class="custom-control-label font-weight-normal" for="remember">
                                                @lang('Remember me?')
                                            </label>
                                        </div>
                                    @endif
                                    
                                    <button type="submit" class="cmn-btn w-100" id="btn-login">@lang('Log In')</button>
                                </div>
                            <p class="dont-acc">Don’t have an account? <a href="{{url('register')}}">Sign up</a></p>
                            <span class="or">Or </span>
                                @include('auth.social.buttons')
                             
                            </div>
                        </form>
                       
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Login Reg end -->
 
@stop

@section('scripts')
    {!! HTML::script('assets/js/as/login.js') !!}
    {!! JsValidator::formRequest('Vanguard\Http\Requests\Auth\LoginRequest', '#login-form') !!}
@stop
