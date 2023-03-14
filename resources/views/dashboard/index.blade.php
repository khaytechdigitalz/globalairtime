@extends('layouts.app')

@section('page-title', __('Dashboard'))
@section('page-heading', __('Dashboard')) 

@section('content')

@push('style')
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="{{url('public/backend/css/widget.css')}}">
 @endpush
    <!-- Dashboard Section start -->
    <section class="dashboard-section body-collapse">
        <div class="overlay pt-120">
            <div class="container-fruid">
                <div class="row"> 
                        
                        @foreach (\Vanguard\Plugins\Vanguard::availableWidgets(auth()->user()) as $widget)
                            @if ($widget->width)
                                <div class="mb-4 col-md-{{ $widget->width }}">
                            @endif
                                {!! app()->call([$widget, 'render']) !!}
                            @if($widget->width)
                                </div>
                            @endif
                        @endforeach
                         
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
