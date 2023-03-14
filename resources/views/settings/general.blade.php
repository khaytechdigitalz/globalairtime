@extends('layouts.app')

@section('page-title', __('General Settings'))
@section('page-heading', __('General Settings'))


@section('content')


    {!! Form::open(['route' => 'settings.general.update', 'id' => 'general-settings-form']) !!}
    <section class="dashboard-section body-collapse pay step exchange">
        <div class="overlay pt-120">
            <div class="container-fruid">
                <div class="main-content">

                    <div class="row">
                        <div class="col-md-12">
                            @include('partials.messages')

                            <div class="card-body">
                                <div class="form-group mb-3">
                                    <label for="name">@lang('Name')</label>
                                    <input type="text" class="form-control input-solid" id="app_name" name="app_name"
                                        value="{{ setting('app_name') }}">
                                </div>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="cmn-btn">
                        @lang('Update')
                    </button>

                </div>
            </div>
        </div>
    </section>
    {{ Form::close() }}
@stop
