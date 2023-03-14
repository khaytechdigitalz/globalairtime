@extends('layouts.app')

@section('page-title', __('Users'))
@section('page-heading', __('Users'))


@section('content')

@include('partials.messages')


    <!-- Dashboard Section start -->
    <section class="dashboard-section body-collapse transactions">
        <div class="overlay pt-120">
            <div class="container-fruid">
                <div class="head-area">
                    <div class="row">
                        <div class="col-lg-5 col-md-4">
                            <h4>Manage Users</h4>
                        </div>
                        <div class="col-lg-7 col-md-8">
                            <div class="transactions-right d-flex align-items-center">
                                   
                                @if (Request::has('search') && Request::get('search') != '')
                                    <a href="{{ route('users.index') }}"
                                           class="btn btn-light d-flex align-items-center text-muted"
                                           role="button">
                                        <i class="fas fa-times"></i>
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="transactions-main">
                            <div class="top-items">
                                <h6>All Users</h6>
                                <div class="export-area">
                                    <ul class="d-flex align-items-center">
                                        <a href="{{ route('users.create') }}" class="btn btn-primary btn-rounded float-right">
                                            <i class="fas fa-plus mr-2"></i>
                                            @lang('Add User')
                                        </a> 
                                    </ul>
                                </div>
                            </div>
                            <form action="" method="GET" id="users-form" class="flex-fill">

                            <div class="filters-item">
                                <div class="single-item">
                                         <input type="text"
                                        name="search"
                                        value="{{ Request::get('search') }}"
                                        placeholder="@lang('Search for users...')">
                                 </div>
                                
                                <div class="single-item">
                                    {!!
                                        Form::select(
                                            'status',
                                            $statuses,
                                            Request::get('status'),
                                            ['id' => 'status', 'class' => 'form-control input-solid']
                                        )
                                    !!}
                                </div>
                                <div class="single-item">
                                @if (Request::has('search') && Request::get('search') != '')
                                    <a href="{{ route('users.index') }}"
                                           class="btn btn-light d-flex align-items-center text-muted"
                                           role="button">
                                        <i class="fas fa-times"></i>
                                    </a>
                                @endif
                                </div>
                            </div>
                        </form>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Name/ Business</th>
                                            <th scope="col">Date</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (count($users))
                                        @foreach ($users as $user)
                                            @include('user.partials.row')
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="7"><em>@lang('No records found.')</em></td>
                                        </tr>
                                    @endif
                                        
                                    </tbody>
                                </table>
                            </div>
                            <nav aria-label="Page navigation" class="d-flex justify-content-center mt-40">
                            {!! $users->render() !!}
                             </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Dashboard Section end -->

 

@stop

@section('scripts')
    <script>
        $("#status").change(function () {
            $("#users-form").submit();
        });
    </script>
@stop
