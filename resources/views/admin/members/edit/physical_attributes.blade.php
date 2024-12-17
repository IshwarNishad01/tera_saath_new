<div class="card-header bg-dark text-white">
    <h5 class="mb-0 h6">{{translate('Physical Attributes')}}</h5>
</div>
<div class="card-body">
    <form action="{{ route('physical-attribute.update', $member->id) }}" method="POST">
        <input name="_method" type="hidden" value="PATCH">
        @csrf
        <div class="form-group row">
            <div class="col-md-6">
                <label for="height">{{translate('Height')}}</label>
                 <select class="form-control aiz-selectpicker" data-live-search="true" name="height" value="{{ !empty($member->physical_attributes->height) ? $member->physical_attributes->height : "" }}">
                                    <option>Select height</option>
                                    <option>4'1"</option>
                                    <option>4'2"</option>
                                    <option>4'3"</option>
                                    <option>4'4"</option>
                                    <option>4'5"</option>
                                    <option>4'6"</option>
                                    <option>4'7"</option>
                                    <option>4'8"</option>
                                    <option>4'9"</option>
                                    <option>4'10</option>
                                    <option>5'0"</option>
                                    <option>5'1"</option>
                                    <option>5'2"</option>
                                    <option>5'3"</option>
                                    <option>5'4"</option>
                                    <option>5'5"</option>
                                    <option>5'6"</option>
                                    <option>5'7"</option>
                                    <option>5'8"</option>
                                    <option>5'9"</option>
                                    <option>5'10"</option>
                                    <option>6'0"</option>
                                    <option>6'1"</option>
                                    <option>6'2"</option>
                                    <option>6'3"</option>
                                    <option>6'4"</option>
                                    <option>6'5"</option>
                                    <option>6'6</option>
                                    <option>6'7</option>
                                    <option>6'8</option>
                                    <option>6'9</option>
                                    <option>6'10</option>
                                
                                </select>
                <!-- <input type="number" name="height" value="{{ !empty($member->physical_attributes->height) ? $member->physical_attributes->height : "" }}" step="0.1" class="form-control" placeholder="{{translate('Height')}}"> -->
                @error('height')
                    <small class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="weight">{{translate('Weight (in kg)')}}</label>
                <input type="number" name="weight" value="{{ !empty($member->physical_attributes->weight) ? $member->physical_attributes->weight : "" }}" placeholder="{{ translate('Weight') }}" class="form-control">
                @error('weight')
                    <small class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-6">
                <label for="eye_color">{{translate('Eye color')}}</label>
                <input type="text" name="eye_color" value="{{ !empty($member->physical_attributes->eye_color) ? $member->physical_attributes->eye_color : "" }}" class="form-control" placeholder="{{translate('Eye Color')}}">
                <!-- @error('eye_color')
                    <small class="form-text text-danger">{{ $message }}</small>
                @enderror -->
            </div>
            <div class="col-md-6">
                <label for="hair_color">{{translate('Hair Color')}}</label>
                <input type="text" name="hair_color" value="{{ !empty($member->physical_attributes->hair_color) ? $member->physical_attributes->hair_color : "" }}" placeholder="{{ translate('Hair Color') }}" class="form-control">
                <!-- @error('hair_color')
                    <small class="form-text text-danger">{{ $message }}</small>
                @enderror -->
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-6">
                <label for="complexion">{{translate('Complexion')}}</label>
                <input type="text" name="complexion" value="{{ !empty($member->physical_attributes->complexion) ? $member->physical_attributes->complexion : "" }}" class="form-control" placeholder="{{translate('Complexion')}}">
                <!-- @error('complexion')
                    <small class="form-text text-danger">{{ $message }}</small>
                @enderror -->
            </div>
            <div class="col-md-6">
                <label for="blood_group">{{translate('Blood Group')}}</label>
                <input type="text" name="blood_group" value="{{ !empty($member->physical_attributes->blood_group) ? $member->physical_attributes->blood_group : "" }}" placeholder="{{ translate('Blood Group') }}" class="form-control">
                <!-- @error('blood_group')
                    <small class="form-text text-danger">{{ $message }}</small>
                @enderror -->
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-6">
                <label for="body_type">{{translate('Body Type')}}</label>
                <input type="text" name="body_type" value="{{ !empty($member->physical_attributes->body_type) ? $member->physical_attributes->body_type : "" }}" class="form-control" placeholder="{{translate('Body Type')}}">
                <!-- @error('body_type')
                    <small class="form-text text-danger">{{ $message }}</small>
                @enderror -->
            </div>
            <div class="col-md-6">
                <label for="body_art">{{translate('Body Art')}}</label>
                <input type="text" name="body_art" value="{{ !empty($member->physical_attributes->body_art) ? $member->physical_attributes->body_art : "" }}" placeholder="{{ translate('Body Art') }}" class="form-control">
               <!--  @error('body_art')
                    <small class="form-text text-danger">{{ $message }}</small>
                @enderror -->
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-6">
                <label for="disability">{{translate('Disability')}}</label>
                <input type="text" name="disability" value="{{ !empty($member->physical_attributes->disability) ? $member->physical_attributes->disability : "" }}" class="form-control" placeholder="{{translate('Disability')}}">
                <!-- @error('disability')
                    <small class="form-text text-danger">{{ $message }}</small>
                @enderror -->
            </div>
        </div>

        <div class="text-right">
            <button type="submit" class="btn btn-info btn-sm">{{translate('Update')}}</button>
        </div>
    </form>
</div>
