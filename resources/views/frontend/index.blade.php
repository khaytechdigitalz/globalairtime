@extends('layouts.front')

@section('page-title', __('Home Page'))
@section('page-heading', __('Home'))
 
@section('content')
@include('partials.messages')
@include('partials.header')
 
   <!-- Banner Section start -->
   <section class="banner-section corporate-card">
    <div class="overlay">
        <div class="banner-content">
            <div class="container wow fadeInUp">
                <div class="row justify-content-between align-items-center">
                    <div class="col-lg-6 col-md-7">
                        <div class="main-content">
                            <div class="top-area section-text">
                                <h5 class="sub-title">Buy airtime and data for all networks across the globe</h5>
                                <h1 class="title">Buy Airtime & Internet Data</h1>
                                <p class="xlr">Buy airtime for your self, friends and family. You can setup a monthly, weekly or yearly airtime plan for you and your loved ones.</p>
                            </div>
                            <div class="bottom-area d-xxl-flex">
                                @auth
                                <a href="{{url("dashboard")}}" class="cmn-btn">Account</a>
                                @else
                                <a href="{{url("register")}}" class="cmn-btn">Open a Free Account</a>
                                @endauth
                                <a class="cmn-btn active mfp-iframe popupvideo" href="https://www.youtube.com/watch?v=Djz8Nc0Qxwk">See How it Works</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Banner Section end -->

    <!-- Feature start -->
    <section class="global-payment feature">
        <div class="overlay pt-120 pb-120">
            <div class="container wow fadeInUp">
                <div class="row justify-content-center">
                    <div class="col-lg-7">
                        <div class="section-header text-center">
                            <h5 class="sub-title">Pay utility bills even faster</h5>
                            <h2 class="title">More Savings, More Time, More Peace of Mind</h2>
                            <p>Get everything you need to create and manage your bills payment planning program with our unified payments platform.</p>
                        </div>
                    </div>
                </div>
                <div class="row cus-mar">
                    <div class="col-lg-4 col-md-6">
                        <div class="single-item">
                            <img src="{{url('public/frontend/images/icon/features-corporate-icon-1.png')}}" alt="icon">
                            <h5>Earn Cashback</h5>
                            <p>The banks don't reward you like this. Earn 1% cashback..</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="single-item">
                            <img src="{{url('public/frontend/images/icon/features-corporate-icon-2.png')}}" alt="icon">
                            <h5>Track Spending</h5>
                            <p>Get real-time notifications at your fingertips. Set spending budgets.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="single-item">
                            <img src="{{url('public/frontend/images/icon/features-corporate-icon-3.png')}}" alt="icon">
                            <h5>Completely Free</h5>
                            <p>No lengthy sign up, annual, or hidden fees. Get started in 5 minutes</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Feature end -->

    <!-- Multi Currency start -->
    <section class="multi-currency">
        <div class="overlay pb-120">
            <div class="container wow fadeInUp">
                <div class="row align-items-center justify-content-between">
                    <div class="col-md-6">
                        <div class="section-text">
                            <h5 class="sub-title">Multi-currency bills payment platform</h5>
                            <h2 class="title">Buy airtime with 5x cheaper international payments</h2>
                            <p>Spend at the best rate, with a low transparent fee. Easy, fast, transparent.</p>
                        </div>
                        <div class="btn-area">
                            <a href="{{url("register")}}" class="cmn-btn">Open Account</a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="sec-image">
                            <img src="{{url('public/frontend/images/multi-currency-img.png')}}" alt="image" class="max-un">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Multi Currency end -->
 
@stop

@push('scripts')
   
@endpush
