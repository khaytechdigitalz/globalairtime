@php
$transactionlog = Vanguard\Transaction::whereUserId(Auth::user()->id)->take(10)->get();
$last = Vanguard\Transaction::whereUserId(Auth::user()->id)->whereStatus('success')->latest()->first();
@endphp
<div class="col-xl-12 col-lg-12">
    <div class="section-content">
        <div class="acc-details">
            <div class="top-area">
                <div class="left-side">
                    <h5>Hi, {{Auth::user()->username}}!</h5>
                    <h2>0.00</h2>
                    <h5 class="receive">Total Transaction</h5>
                </div>
                <div class="right-side">
                     
                    <div class="right-bottom">
                        <h4>@if($last) {{number_format($last->amount,2) ?? 0.00}}<small>{{$last->currency ?? ""}} @else 0.00 @endif</small></h4>
                        <h5>Last Payment</h5>
                    </div>
                </div>
            </div>
            <div class="bottom-area">
                <div class="left-side">
                    <a href="{{route('airtime')}}" class="cmn-btn">Buy Airtime</a>
                    <a href="#" class="cmn-btn">Buy Data</a>
                </div>
                <div class="right-side">
                    <div class="dropdown-area">
                        <button type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="{{url('public/backend/images/icon/option.png')}}" alt="icon">
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="">Recipients</a></li>
                            <li><a class="dropdown-item" href="">Request Money</a></li>
                            <li><a class="dropdown-item" href="">Send Money</a></li>
                            <li><a class="dropdown-item" href="">Bill Pay</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="transactions-area mt-40">
            <div class="section-text">
                <h5>Transactions</h5>
                <p>Your last 10 recent transaction log</p>
            </div>
            <div class="top-area d-flex align-items-center justify-content-between">
                 
                <div class="view-all d-flex align-items-center">
                    <a href="javascript:void(0)">View All</a>
                    <img src="{{url('public/backend/images/icon/right-arrow.png')}}" alt="icon">
                </div>
            </div>
            <div class="tab-content mt-40">
                <div class="tab-pane fade show active" id="latest" role="tabpanel"
                    aria-labelledby="latest-tab">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Type/ Operator</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                

                                @forelse($transactionlog as $data)
                                <tr data-bs-toggle="modal" data-bs-target="#transactionsMod">
                                    <th scope="row">
                                        <p>{{strtoUpper($data->trx_type)}}</p>
                                        <p class="mdr">{{$data->provider}}</p>
                                    </th>
                                    <td>
                                        <p>
                                            {{Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $data->created_at)->format('M d Y')}}</p>
                                        <p class="mdr">{{--{{$data->created_at->diffForHumans()}}--}}
                                            {{Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $data->created_at)->format('H:i:s A')}}
                                        </p>
                                    </td>
                                    <td>
                                        <p class="@if($data->status == 'pending') inprogress @elseif($data->status == 'success') completed @else cancelled @endif">{{strtoUpper($data->status)}}</p>
                                        <p class="mdr "><b>{{$data->trx}}</b></p>
                                    </td>
                                    <td>
                                        <p>{{number_format($data->amount,2)}}<small>{{$data->currency}}</small></p>
                                        <p class="mdr">{{$data->type}}</p>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4">
                                        <div class="alert alert-warning" role="alert">
                                            Oops <a href="#" class="alert-link">You dont have any transaction history yet
                                          </div>                                          
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                 
            </div>
        </div>
    </div>
</div>
 