<div class="card-header bg-dark text-white">
    <h5 class="mb-0 h6">{{translate('Basic Information')}}</h5>
</div>
<div class="card-body">

    <form action="{{ route('member.basic_info_update', $member->id) }}" method="POST">
        @csrf
        <div class="form-group row">
            <div class="col-md-6">
                <label for="first_name" >{{translate('First Name')}}
                    <span class="text-danger">*</span>
                </label>
                <input type="text" name="first_name" value="{{ $member->first_name }}" class="form-control" placeholder="{{translate('First Name')}}">
                @error('first_name')
                    <small class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="first_name" >{{translate('Last Name')}}
                    <span class="text-danger">*</span>
                </label>
                <input type="text" name="last_name" value="{{ $member->last_name }}" class="form-control" placeholder="{{translate('Last Name')}}">
                @error('last_name')
                    <small class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-6">
                <label for="first_name" >{{translate('Gender')}}
                    <span class="text-danger">*</span>
                </label>
                <select class="form-control aiz-selectpicker" name="gender">
                    <option value="1" @if($member->member->gender ==  1) selected @endif >{{translate('Male')}}</option>
                    <option value="2" @if($member->member->gender ==  2) selected @endif >{{translate('Female')}}</option>
                    @error('gender')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </select>
            </div>
            <div class="col-md-6">
                <label for="first_name" >{{translate('Date Of Birth')}}
                    <span class="text-danger">*</span>
                </label>
                <input type="text" class="aiz-date-range form-control" value="@if(!empty($member->member->birthday)) {{date('Y-m-d', strtotime($member->member->birthday))}} @endif" name="date_of_birth"  placeholder="Select Date" data-single="true" data-show-dropdown="true">
                @error('date_of_birth')
                    <small class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <div class="@if(addon_activation('otp_system')) col-md-6 @else col-md-12 @endif">
                <label for="email" >{{translate('Email')}}
                    <span class="text-danger">*</span>
                </label>
                <input type="email" name="email" value="{{ $member->email }}" class="form-control" placeholder="{{translate('Email')}}">
                @error('email')
                    <small class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>
            @if(addon_activation('otp_system'))
              <div class="col-md-6">
                  <label for="first_name" >{{translate('Phone Number')}}</label>
                  <input type="text" name="phone" value="{{ $member->phone }}" class="form-control" placeholder="{{translate('Phone')}}">
                  @error('phone')
                      <small class="form-text text-danger">{{ $message }}</small>
                  @enderror
              </div>
            @endif
        </div>
        <div class="form-group row">
            <div class="col-md-12">
                <label for="first_name" >{{translate('On Behalf')}}
                    <span class="text-danger">*</span>
                </label>
                <select class="form-control aiz-selectpicker" name="on_behalf" data-live-search="true">
                    @foreach ($on_behalves as $on_behalf)
                        <option value="{{$on_behalf->id}}" @if($member->member->on_behalves_id == $on_behalf->id) selected @endif>{{$on_behalf->name}}</option>
                    @endforeach
                </select>
                @error('on_behalf')
                    <small class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-6">
                <label for="first_name" >{{translate('Marital Status')}}
                    <span class="text-danger">*</span>
                </label>
                <select class="form-control aiz-selectpicker" name="marital_status" data-live-search="true">
                    @foreach ($marital_statuses as $marital_status)
                        <option value="{{$marital_status->id}}" @if($member->member->marital_status_id == $marital_status->id) selected @endif>{{$marital_status->name}}</option>
                    @endforeach
                </select>
                @error('marital_status')
                    <small class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="first_name" >{{translate('Number Of Children')}}
                    <span class="text-danger">*</span>
                </label>

                <select class="form-control" name="children">
                    <option>Select Option</option>
                    <option value="have">Have</option>
                    <option value="doesn't matter">Doesn't matter</option>
                    <option value="no">No</option>
                    <option value="okay if not staying together">Okay if not staying together</option>
                </select>
                <!-- <input type="text" name="children" value="{{ $member->children }}" class="form-control" placeholder="{{translate('Number Of Children')}}" > -->
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <label for="contact_number" >{{translate('Contact Number')}}
                    <span class="text-danger">*</span>
                </label>
                <input type="text" name="contact_number" value="{{ $member->contact_number }}" class="form-control" placeholder="{{translate('Contact Number')}}">
                @error('contact_number')
                    <small class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-12">
              <label class="" for="signinSrEmail">{{translate('Photo')}}</small></label>
                <div class="input-group" data-toggle="aizuploader" data-type="image">
                    <div class="input-group-prepend">
                        <div class="input-group-text bg-soft-secondary font-weight-medium">{{ translate('Browse')}}</div>
                    </div>
                    <div class="form-control file-amount">{{ translate('Choose File') }}</div>
                    <input type="hidden" name="photo" class="selected-files" value="{{ $member->photo}}">
                </div>
                <div class="file-preview box sm">
                </div>
            </div>
        </div>
        <div class="text-right">
            <button type="submit" class="btn btn-info btn-sm">{{translate('Update')}}</button>
        </div>
    </form>
</div>
