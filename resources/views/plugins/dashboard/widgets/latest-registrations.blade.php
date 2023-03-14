<div class="side-items">
      
    <div class="single-item">
        <div class="section-text d-flex align-items-center justify-content-between">
            <h6> @lang('Latest Registrations')</h6>
            <div class="view-all d-flex align-items-center">
                <a href="{{ route('users.index') }}">View All</a>
                <img src="{{url('public/backend/images/icon/right-arrow.png')}}" alt="icon">
            </div>
        </div>
        @if (count($latestRegistrations))
        <ul class="recipients-item">
            @foreach ($latestRegistrations as $user)
            <li>
                <p class="left d-flex align-items-center">
                    <img src="{{ $user->present()->avatar }}" alt="icon">
                    <span class="info">
                        <span>{{ $user->present()->nameOrEmail }}</span>
                        <span>{{ $user->created_at->diffForHumans() }}</span>
                    </span>
                </p>
                <p class="right">
                    <a href="{{ route('users.show', $user) }}">
                    <span> View</span>
                     </a>
                </p>
            </li>
            @endforeach 
             
        </ul>
        @else
        <p class="text-muted">@lang('No records found.')</p>
        @endif
    </div>
</div>
 