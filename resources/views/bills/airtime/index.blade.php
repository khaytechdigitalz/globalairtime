@extends('layouts.app')

@section('page-title', __('Airtime'))
@section('page-heading', __('Airtime')) 

@section('content')

@push('style')
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="{{url('public/backend/css/widget.css')}}">
 @endpush
   
    <!-- Dashboard Section start -->
    <section class="dashboard-section body-collapse pay step crypto deposit-money">
        <div class="overlay pt-120">
            <div class="container-fruid">
                <div class="main-content">
                    <div class="head-area d-flex align-items-center justify-content-between">
                        <h5>Buy Airtime</h5>
                        <div class="icon-area">
                            <img src="{{url('public/backend/images/icon/support-icon.png')}}" alt="icon">
                        </div>
                    </div>
                    <div class="row justify-content-between pb-120">
                        @include('partials.messages')

                        <div class="col-xl-3 col-lg-4 col-md-5">
                            <div class="left-area">
                                <ul>
                                    <li><a href="javascript:void(0)" class="single-link active">Beneficiary's Details</a></li>
                                    <li><a href="javascript:void(0)" class="single-link two">Enter amount</a></li>
                                    <li><a href="javascript:void(0)" class="single-link last">Confirm Order</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-9 col-lg-8 col-md-7">
                            <div class="table-area">
                                <div class="head-area">
                                    <h6>Enter Beneficiary's Details</h6>
                                </div>
                                <div class="">
                                    <form  action="{{route('airtime.step1')}}"  method="post" enctype="multipart/form-data" onsubmit="return submitUserForm();">
                                     @csrf                                    <div class="row justify-content-center">
                                            <div class="col-md-12 mb-3">
                                                <div class="single-input">
                                                    <label for="cardNumber">Email Address</label>
                                                    <input type="email" id="email" name="email" placeholder="example@mail.com">
                                                </div>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <div class="single-input">
                                                    <label for="cardHolder">Phone Number</label>
                                                    <input type="tel" id="tel" name="tel" placeholder="+2348012345678">
                                                </div>
                                            </div> 
                                            <div class="col-12">
                                                <div class="btn-border w-100">
                                                    <button type="submit" class="cmn-btn w-100">Proceed</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            {{--
                            <div class="footer-area mt-40">
                                <a href="javascript:void(0)">Previous Step</a>
                                <a href="deposit-money-2.html" class="active">Next</a>
                            </div>
                            --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Dashboard Section end -->
 

@stop

@section('scripts')
    @foreach (\Vanguard\Plugins\Vanguard::availableWidgets(auth()->user()) as $widget)
        @if (method_exists($widget, 'scripts'))
            {!! app()->call([$widget, 'scripts']) !!}
        @endif
    @endforeach
@stop
