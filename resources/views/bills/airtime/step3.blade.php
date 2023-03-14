@extends('layouts.app')

@section('page-title', __('Airtime'))
@section('page-heading', __('Airtime')) 

@section('content')

@push('style')
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="{{url('public/backend/css/widget.css')}}">
 @endpush

    <!-- Dashboard Section start -->
    <section class="dashboard-section body-collapse pay step step-3 crypto deposit-money">
        <div class="overlay pt-120">
            <div class="container-fruid">
                <div class="main-content">
                    <div class="head-area d-flex align-items-center justify-content-between">
                        <h5>Confirm Payment</h5>
                        <a href="{{route('airtime')}}">
                        <div class="icon-area">
                            <img src="{{url('public/backend/images/icon/support-icon.png')}}" alt="icon">
                        </div>
                        </a>
                    </div>
                    <div class="row justify-content-between pb-120">
                        <div class="col-xl-3 col-lg-4">
                            <div class="left-area">
                                <ul>
                                    <li><a href="javascript:void(0)" class="single-link active ">Beneficiary's Details</a></li>
                                    <li><a href="javascript:void(0)" class="single-link active">Enter amount</a></li>
                                    <li><a href="javascript:void(0)" class="single-link active last">Confirm Order</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-8 col-lg-8">
                           {{-- <form  action=""  method="post" onsubmit="return submitUserForm();">
                            @csrf --}} 
                                <div class="payment-details">
                                    <div class="top-area">
                                        <h6>Confirm  transaction details</h6> 
                                    </div>
                                    <div class="row">
                                        <div class="col-xxl-8 col-xl-9 col-lg-12">
                                            <ul class="details-list">
                                                <li>
                                                    <span>Beneficiary's Phone</span>
                                                    <b>{{Session::get('bphone')}}</b>
                                                </li>
                                                <li>
                                                    <span>Beneficiary's E-mail</span>
                                                    <b><a>{{Session::get('bemail')}}</a></b>
                                                </li>
                                                <li>
                                                    <span>Network Provider</span>
                                                    <b>{{Session::get('operatorName')}}</b>
                                                </li>
                                                <li>
                                                    <span>Country</span>
                                                    <b>{{Session::get('countryName')}}</b>
                                                </li>
                                                <li>
                                                    <span>Continent</span>
                                                    <b>{{Session::get('countryContinent')}}</b>
                                                </li>
                                                <li>
                                                    <span>Amount</span>
                                                    <b>{{Session::get('amount')}}<small>{{Session::get('countryCurrency')}}</small></b>
                                                </li> 
                                               
                                            </ul>

                                          
                                        </div>
                                      {{--<div id="embed-target"> </div>--}}
                                    </div>
                                </div>
                               {{--
                                <div class="checkbox-area mt-40 d-flex align-items-center justify-content-center">
                                    <input type="checkbox" required  id="accept" name="accept">
                                    <label for="accept">I accept <a href="javascript:void(0)">terms of use</a></label>
                                </div>
                                --}}
                                <center><b class="text-danger" id="errorlog"></b></center>
                                <div class="footer-area mt-40"> 
                                    <input type="button" class="cmn-btn active" value="Proceed To Payment Page" onclick="Checkout.showPaymentPage();" />
                                </div>
                        
                            {{--</form>--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Dashboard Section end -->

@stop

@push('script')

<script>
</script>
@endpush

<script src="https://ap.gateway.mastercard.com/static/checkout/checkout.min.js" data-error="errorCallback" data-cancel="cancelCallback"></script>
<script>
    function errorCallback(error) 
    {
        console.log('error', JSON.stringify(error));
        var reply = JSON.stringify(error)
        if(error.result == 'ERROR')
        {
        let respond = reply.replace("error.explanation", "message");
        var resp = JSON.parse(respond)
        document.getElementById("errorlog").innerHTML = resp.message;
        } 
    }
    function cancelCallback() {
        document.getElementById("errorlog").innerHTML = "Payment cancelled";
     }

    Checkout.configure({
        session: {
            id: '{{$sessionid}}'
        },
    });
</script>
