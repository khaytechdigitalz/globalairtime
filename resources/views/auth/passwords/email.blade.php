@extends('layouts.auth')

@section('page-title', __('Reset Password'))

@section('content')


    <!-- Email start -->
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
                            src="{{url('public/frontend/images/integrations-features-2.png')}}" class="max-un" alt="image">
                        </div>
                    </div>
                    <div class="col-xl-5">
                       
                        <div class="text-center">
                            <a href="{{url('/')}}">
                            <img src="{{ url('public/assets/img/vanguard-logo.png') }}" width="100" alt="{{ setting('app_name') }}" height="50">
                             </a>
                        </div>
                       
                        <div class="card mt-5">
                            <div class="card-body">
                                <h5 class="card-title text-center mt-4 mb-2 text-uppercase">
                                    @lang('Forgot Your Password?')
                                </h5>
                    
                                <div class="p-4">
                                    <form role="form" action="<?= route('password.email') ?>" method="POST" id="remind-password-form" autocomplete="off">
                                        {{ csrf_field() }}
                    
                                        <p class="text-muted mb-4 text-center font-weight-light">
                                            @lang('Please provide your email below and we will send you a password reset link.')
                                        </p>
                    
                                        @include('partials.messages')
                    
                                        <div class="form-group password-field my-3">
                                            <label for="password" class="sr-only">@lang('Email')</label>
                                            <input type="email"
                                                   name="email"
                                                   id="email"
                                                   placeholder="@lang('Your E-Mail')">
                                        </div>
                    
                                        <div class="form-group mt-4">
                                            <button type="submit" class="cmn-btn w-100 btn btn-primary btn-lg btn-block" id="btn-reset-password">
                                                @lang('Reset Password')
                                            </button>
                                        </div>
                                        <p class="dont-acc">Have an account? <a href="{{url('login')}}">Login</a></p>
                    
                                    </form>
                                </div>
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>
    </section>
 

@stop

@section('scripts')
    {!! JsValidator::formRequest('Vanguard\Http\Requests\Auth\PasswordRemindRequest', '#remind-password-form') !!}
@stop
