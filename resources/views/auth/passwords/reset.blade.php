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
                                @lang('Please provide your email and enter new password below.')
                            </h5>
                            <h3 class="title">  @lang('Reset Your Password')</h3>
                
                            <div class="p-4">
                                <form role="form" action="{{ route('password.update') }}" method="POST" id="reset-password-form"
                                autocomplete="off" class="p-4">
                                <input type="hidden" name="token" value="{{ $token }}">
                                {{ csrf_field() }}
                
                                    <p class="text-muted mb-4 text-center font-weight-light">
                                        @lang('Please provide your email below and we will send you a password reset link.')
                                    </p>
                
                                    @include('partials.messages')
                                    <div class="form-group password-field my-3">
                                        <label for="password" class="sr-only">@lang('Your E-Mail')</label>
                                        <input type="email"
                                                name="email"
                                                id="email"
                                                class="form-control input-solid"
                                                placeholder="@lang('Your E-Mail')">
                                                        </div>
                
                                    <div class="form-group password-field my-3">
                                        <label for="password" class="sr-only">@lang('New Password')</label>
                                        <input type="password"
                                            name="password"
                                            id="password"
                                            class="form-control input-solid"
                                            placeholder="@lang('New Password')">
                                    </div>
                                    
                                    <div class="form-group password-field my-3">
                                        <label for="password" class="sr-only">@lang('Confirm New Password')</label>
                                        <input type="password"
                                            name="password_confirmation"
                                            id="password_confirmation"
                                            class="form-control input-solid"
                                            placeholder="@lang('Confirm New Password')">
                                    </div>
                
                                    <div class="form-group mt-4">
                                        <button type="submit" class="cmn-btn w-100 btn btn-primary btn-lg btn-block" id="btn-reset-password">
                                            @lang('Update Password')
                                        </button>
                                    </div>
                                   
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
    {!! JsValidator::formRequest('Vanguard\Http\Requests\Auth\PasswordResetRequest', '#reset-password-form') !!}
@stop
