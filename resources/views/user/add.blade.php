@extends('layouts.app')

@section('page-title', __('Add User'))
@section('page-heading', __('Create New User'))
 

@section('content')


    <!-- Dashboard Section start -->
    <section class="dashboard-section body-collapse pay step exchange">
        <div class="overlay pt-120">
            <div class="container-fruid">
                <div class="main-content">
                    <div class="head-area d-flex align-items-center justify-content-between">
                        <h4>Add New User</h4>
                        <div class="icon-area">
                            <img src="{{url('public/backend/images/icon/support-icon.png')}}" alt="icon">
                        </div>
                    </div>

                    @include('partials.messages')
                    <div class="row">
                        <div class="col-xl-12 col-lg-12">
                            <div class="choose-recipient">
                                 
                                 
                                <div class="tab-content">
                                    <div class="" id="recipients" role="tabpanel" aria-labelledby="recipients-tab">
                                        <div class="section-head">
                                            <h5>Add a new recipient</h5>
                                            <p>Please fill the form below to add new user.</p>
                                        </div>
                                        {!! Form::open(['route' => 'users.store', 'files' => true, 'id' => 'user-form']) !!}
                                        @include('user.partials.details', ['edit' => false, 'profile' => false])
                                        
                                        @include('user.partials.auth', ['edit' => false])

                                        <div class="col-12">
                                            <div class="footer-area mt-40">
                                                <button type="submit" class="cmn-btn w-100"> @lang('Create User')</button>
                                            </div>
                                        </div>
                                            {!! Form::close() !!}
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

@section('scripts')
    {!! HTML::script('assets/js/as/profile.js') !!}
    {!! JsValidator::formRequest('Vanguard\Http\Requests\User\CreateUserRequest', '#user-form') !!}
@stop