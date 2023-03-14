<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="single-input">
            <label for="recipientsfname">Email</label>
            <input type="email"
            id="email"
           name="email"
           placeholder="@lang('Email')"
           value="{{ $edit ? $user->email : '' }}">                                                   </div>
    </div>
    <div class="col-md-6">
        <div class="single-input">
            <label for="recipientslname">Username</label>
            <input type="text"
            id="username"
           placeholder="(@lang('optional'))"
           name="username"
           value="{{ $edit ? $user->username : '' }}">
        </div>
    </div>
    <div class="col-md-12">
        <div class="single-input">
            <label for="password">{{ $edit ? __("New Password") : __('Password') }}</label>
            <input type="password"
                    id="password"
                   name="password"
                   @if ($edit) placeholder="@lang("Leave field blank if you don't want to change it")" @endif>
        </div>
    </div>

    <div class="col-md-12">
        <div class="single-input">
            <label for="password_confirmation">{{ $edit ? __("Confirm New Password") : __('Confirm Password') }}</label>
            <input type="password"
             id="password_confirmation"
            name="password_confirmation"
            @if ($edit) placeholder="@lang("Leave field blank if you don't want to change it")" @endif>
        </div>
    </div>
</div>

 
@if ($edit)
    <button type="submit" class="cmn-btn w-100" id="update-login-details-btn">
         
        @lang('Update Details')
    </button>
@endif
