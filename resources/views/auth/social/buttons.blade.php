@if ($socialProviders)
    <?php $colSize = 12 / count($socialProviders); ?>

    <div class="row pb-3 pt-2">
        @if (in_array('facebook', $socialProviders))
        <div class="reg-google">
            <a href="{{ url('auth/facebook/login') }}"><i class="fab fa-facebook"></i>Log in with Google</a>
        </div> 
        @endif

        @if (in_array('twitter', $socialProviders))
        <div class="reg-google">
            <a href="{{ url('auth/twitter/login') }}"><i class="fab fa-twitter"></i>Log in with Google</a>
        </div> 
        @endif

        @if (in_array('google', $socialProviders))
        <div class="reg-google">
            <a href="{{ url('auth/google/login') }}"><i class="fab fa-google"></i>Log in with Google</a>
        </div> 
        @endif
    </div>

@endif