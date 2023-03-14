@extends('layouts.auth')

@section('page-title', __('Sign Up'))

@if (setting('registration.captcha.enabled'))
    <script src='https://www.google.com/recaptcha/api.js'></script>
@endif

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
                            src="{{url('public/frontend/images/register.png')}}" class="max-un" alt="image">
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
                            <h5 class="sub-title">Welcome to {{ setting('app_name') }}</h5>
                           
                        </div>
                        <form role="form" action="<?= url('register') ?>" method="post" id="registration-form" autocomplete="off" class="mt-3">
                            <input type="hidden" value="<?= csrf_token() ?>" name="_token">
                   
                            @include('partials.messages')
                            <input type="hidden" value="<?= csrf_token() ?>" name="_token">
                            

                            <div class="row">
                                <div class="col-12">
                                    <div class="single-input">
                                        <label for="username" class="sr-only">@lang('Email or Username')</label>
                                        <input type="email"
                                            name="email"
                                            id="email"
                                             placeholder="@lang('Email')"
                                            value="{{ old('email') }}">
                                    </div>
                                    <div class="single-input">
                                        <label for="username" class="sr-only">@lang('Username')</label>
                                        <input type="text"
                                        name="username"
                                        id="username"
                                         placeholder="@lang('Username')"
                                        value="{{ old('username') }}">
                                     </div>

                                    <div class="single-input">
                                        <label for="password" class="sr-only">@lang('Password')</label>
                                        <input type="password"
                                        name="password"
                                        id="password"
                                         placeholder="@lang('Password')">
                                     </div>

                                     <div class="single-input">
                                        <label for="password_confirmation" class="sr-only">@lang('Confirm Password')</label>
                                        <input type="password"
                                        name="password_confirmation"
                                        id="password_confirmation"
                                         placeholder="@lang('Confirm Password')">
                                     </div>
                                     @if (setting('tos'))
                                     <div class="custom-control custom-checkbox">
                                         <input type="checkbox" class="custom-control-input" name="tos" id="tos" value="1"/>
                                         <label class="custom-control-label font-weight-normal" for="tos">
                                             @lang('I accept')
                                             <a href="#tos-modal" data-bs-toggle="modal">@lang('Terms of Service')</a>
                                         </label>
                                     </div>
                                    @endif
                                    {{-- Only display captcha if it is enabled --}}
                                    @if (setting('registration.captcha.enabled'))
                                        <div class="form-group my-4">
                                            {!! app('captcha')->display() !!}
                                        </div>
                                    @endif
                                    {{-- end captcha --}}
                                    
                                    <button type="submit" class="cmn-btn w-100" id="btn-login">@lang('Register')</button>
                                </div>
                            <p class="dont-acc">Have an account? <a href="{{url('login')}}">Login</a></p>
                            <span class="or">Or </span>
                                @include('auth.social.buttons')
                             
                            </div>
                        </form>
                       
                    </div>
                </div>
            </div>
        </div>
        @if (setting('tos'))
        <div class="modal fade" id="tos-modal" tabindex="-1" role="dialog" aria-labelledby="tos-label">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="tos-label">@lang('Terms of Service')</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @include('auth.tos')
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            @lang('Close')
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endif
    </section>
    
@stop

@section('scripts')
    {!! JsValidator::formRequest('Vanguard\Http\Requests\Auth\RegisterRequest', '#registration-form') !!}
@stop
