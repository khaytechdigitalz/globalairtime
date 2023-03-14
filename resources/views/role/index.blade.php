@extends('layouts.app')

@section('page-title', __('Roles'))
@section('page-heading', __('Roles'))

@section('breadcrumbs')
    <li class="breadcrumb-item active">
        @lang('Roles')
    </li>
@stop

@section('content')


    <!-- Dashboard Section start -->
    <section class="dashboard-section body-collapse transactions">
        <div class="overlay pt-120">
            <div class="container-fruid">
                 
                <div class="row">
                    <div class="col-xl-12">


                    @include('partials.messages')
                        <div class="transactions-main">
                            <div class="top-items">
                                <h6>Manage Roles</h6>
                                <a href="{{ route('roles.create') }}" class="cmn-btn w-100r">
                                    <i class="fas fa-plus mr-2"></i>
                                    @lang('Add Role')
                                </a>
                            </div>
                             
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Name/ Display</th>
                                            <th scope="col">Date</th>
                                            <th scope="col">User Count</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (count($roles))
                                        @foreach ($roles as $role)
                                        <tr data-bs-toggle="modal" data-bs-target="#transactionsMod">
                                            <th scope="row">
                                                <p>{{ $role->name }}</p>
                                                <p class="mdr">{{ $role->display_name }}</p>
                                            </th>
                                            <td>
                                                <p>03:00 PM</p>
                                                <p class="mdr"></p>
                                            </td>
                                            <td>
                                                <p class="inprogress">{{ $role->users_count }}</p>
                                            </td>
                                            <td>
                                                <a href="{{ route('roles.edit', $role) }}" class="btn btn-icon"
                                                title="@lang('Edit Role')" data-toggle="tooltip" data-placement="top">
                                                 <i class="fas fa-edit"></i>
                                             </a>
                                             @if ($role->removable)
                                                 <a href="{{ route('roles.destroy', $role) }}" class="btn btn-icon"
                                                    title="@lang('Delete Role')"
                                                    data-toggle="tooltip"
                                                    data-placement="top"
                                                    data-method="DELETE"
                                                    data-confirm-title="@lang('Please Confirm')"
                                                    data-confirm-text="@lang('Are you sure that you want to delete this role?')"
                                                    data-confirm-delete="@lang('Yes, delete it!')">
                                                     <i class="fas fa-trash"></i>
                                                 </a>
                                             @endif
                                            </td>
                                        </tr>
                                        @endforeach
                                        @else
                                            <tr>
                                                <td colspan="4"><em>@lang('No records found.')</em></td>
                                            </tr>
                                        @endif 
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Dashboard Section end -->

 
@stop
