@push('style')
  @endpush
@push('script')
 @endpush
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="single-input">
            <label for="recipientsfname">First Name</label>
            <input type="text" id="first_name"
            name="first_name" placeholder="@lang('First Name')" value="{{ $edit ? $user->first_name : '' }}"/>                                                    
        </div>
    </div>
    <div class="col-md-6">
        <div class="single-input">
            <label for="recipientslname">Last Name</label>
            <input type="text"  id="last_name" name="last_name" placeholder="@lang('Last Name')" value="{{ $edit ? $user->last_name : '' }}"/>
        </div>
    </div>
    <div class="col-md-12">
        <div class="single-input">
            <label for="recipientslAddress">Date of Birth</label>
            <input type="text" name="birthday" id='birthday' value="{{ $edit && $user->birthday ? $user->present()->birthday : '' }}"/>
        </div>
    </div>
    <div class="col-md-6">
        <div class="single-input">
            <label for="recipientslCity">Phone Number</label>
            <input type="text"  id="phone"
            name="phone" placeholder="@lang('Phone')" value="{{ $edit ? $user->phone : '' }}"/>
        </div>
    </div>
    <div class="col-md-6">
        <div class="single-input">
            <label for="recipientslCode">Address</label>
            <input type="text"  id="address" name="address" placeholder="@lang('Address')" value="{{ $edit ? $user->address : '' }}">
        </div>
    </div>
    <div class="col-md-12">
        <div class="single-input">
            <label for="recipientsphone">Country</label> 
            {!! Form::select('country_id', $countries, $edit ? $user->country_id : '', ['class' => '']) !!}
        </div>
    </div> 
    
    <div class="col-md-6">
        <div class="single-input">
            <label for="role_id">Role</label>
            {!! Form::select('role_id', $roles, $edit ? $user->role->id : '',['class' => ' ', 'id' => 'role_id', $profile ? 'disabled' : '']) !!}
        </div>
    </div>

    <div class="col-md-6">
        <div class="single-input">
            <label for="status">Status</label>
            {!! Form::select('status', $statuses, $edit ? $user->status : '',
['class' => '', 'id' => 'status', $profile ? 'disabled' : '']) !!}
        </div>
    </div>
    

    @if ($edit)
        <div class="col-md-12 mt-2">
            <button type="submit" class="cmn-btn w-100" id="update-details-btn">
                 @lang('Update Details')
            </button>
        </div>
    @endif
</div>
 
