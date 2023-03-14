@extends('layouts.app')

@section('page-title', __('Airtime'))
@section('page-heading', __('Airtime')) 

@section('content')

@push('style')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
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
                                    <li><a href="javascript:void(0)" class="single-link active ">Beneficiary's Details</a></li>
                                    <li><a href="javascript:void(0)" class="single-link active">Enter amount</a></li>
                                    <li><a href="javascript:void(0)" class="single-link last">Confirm Order</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-9 col-lg-8 col-md-7">
                            <div class="table-area">
                                <div class="head-area">
                                    <h6>Enter Country and operator's details</h6>
                                </div>
                                <div class="">
                                    <form  action="{{route('submitoperator')}}"  method="post" onsubmit="return submitUserForm();">
                                     @csrf                          
                                        <div class="row justify-content-center">
                                            <div class="col-md-12 mb-3">
                                                <div class="single-input">
                                                    <label for="cardNumber">Enter Amount</label>
                                                    <input required type="number" class="form-control" id="amount" name="amount" placeholder="0.00">
                                                </div>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <label for="cardHolder">Select Country</label>
                                                <div class="single-input" style="overflow-y:autow;">
                                                    <select required class="form-select  js-example-basic-single form-control" id="countryCode" onchange="myFunction()" name="countryCode" placeholder="countryCode">
                                                        <option>Please select a country</option>
                                                        @foreach($country as $data)
                                                        <option data-countryname="{{$data->name}}" data-countrycurrency="{{$data->currencyCode}}"  data-countrycontinent="{{$data->continent}}" value="{{$data->isoName}}">{{$data->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div> 
                                            <div class="col-md-12 mb-3">
                                                <label for="cardHolder">Select Operation</label>
                                                <div class="single-input">
                                                    <select required class="form-select form-control js-example-basic-single" id="operatorId" onchange="myFunction2()" name="operatorId" placeholder="operatorId">
                                                        <option>Please select service provider</option>
                                                        @foreach($operators as $data)
                                                        <option data-operatorname="{{$data->name}}" value="{{$data->id}}">{{$data->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div> 
                                            <input id="currency" hidden name="countrycurrency">
                                            <input id="countryname" hidden name="countryname">
                                            <input id="countrycontinent" hidden name="countrycontinent">
                                            <input id="operatorname" hidden name="operatorname">
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
@push('script')
<script>
 // In your Javascript (external .js resource or <script> tag)
$(document).ready(function() {
    $('.js-example-basic-single').select2();
});
</script>
<script>
function myFunction() {
var countryname = $("#countryCode option:selected").attr('data-countryname');
var countrycurrency = $("#countryCode option:selected").attr('data-countrycurrency');
var countrycontinent = $("#countryCode option:selected").attr('data-countrycontinent');
 document.getElementById("currency").value = countrycurrency;
document.getElementById("countryname").value = countryname;
document.getElementById("countrycontinent").value = countrycontinent;
  };

function myFunction2() {
var operatorname = $("#operatorId option:selected").attr('data-operatorname');   
document.getElementById("operatorname").value = operatorname;
 };
</script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@endpush
@section('scripts')
    @foreach (\Vanguard\Plugins\Vanguard::availableWidgets(auth()->user()) as $widget)
        @if (method_exists($widget, 'scripts'))
            {!! app()->call([$widget, 'scripts']) !!}
        @endif
    @endforeach
@stop
