@extends('layouts.app')

@section('page-title', __('Authentication Settings'))
@section('page-heading', __('Authentication'))

@section('breadcrumbs')
    <li class="breadcrumb-item text-muted">
        @lang('Settings')
    </li>
    <li class="breadcrumb-item active">
        @lang('Authentication')
    </li>
@stop

@section('content')

    <!-- Dashboard Section start -->
    <section class="dashboard-section body-collapse account">
        <div class="overlay pt-120">
            <div class="container-fruid">
                <div class="main-content">
                    <div class="row">

                        <div class="col-xxl-12 col-xl-12">

                            @include('partials.messages')
                            <div class="tab-main">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="account-tab" data-bs-toggle="tab"
                                            data-bs-target="#account" type="button" role="tab" aria-controls="account"
                                            aria-selected="true"> @lang('Registration')</button>
                                    </li>

                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="notification-tab" data-bs-toggle="tab"
                                            data-bs-target="#notification" type="button" role="tab"
                                            aria-controls="notification" aria-selected="false">@lang('Authentication')</button>
                                    </li>
                                </ul>
                                <div class="tab-content mt-40">
                                    <div class="tab-pane fade show active" id="account" role="tabpanel"
                                        aria-labelledby="account-tab">

                                        <form action="#">
                                            <div class="row justify-content-center">


                                                <div class="col-md-6">
                                                    @include('settings.partials.registration')
                                                </div>
                                                <div class="col-md-6">
                                                    @include('settings.partials.recaptcha')
                                                </div>

                                            </div>
                                        </form>
                                    </div>

                                    <div class="tab-pane fade" id="notification" role="tabpanel"
                                        aria-labelledby="notification-tab">
                                        <div class="row">

                                            <div class="col-md-6">
                                                @include('settings.partials.auth')
                                            </div>

                                            <div class="col-md-6">
                                                @include('settings.partials.throttling')
                                            </div>
                                            <div class="col-md-6">
                                                @include('settings.partials.two-factor')
                                            </div>
                                        </div>

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


@stop
