<div class="card">
    <div class="card-header">
        <h5 class="mb-0 h6">{{translate('Family Information')}}</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('families.update', $member->id) }}" method="POST">
            <input name="_method" type="hidden" value="PATCH">
            @csrf
            <div class="form-group row">
                <div class="col-md-6">
                    <label for="father">{{translate('Father')}}</label>
                    <input type="text" name="father" value="{{ !empty($member->families->father) ? $member->families->father : "" }}" class="form-control" placeholder="{{translate('Father')}}" required>
                    @error('father')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="fatherdesc">{{translate('Father Description')}}</label>
                    <input type="text" name="fatherdesc" value="{{ !empty($member->families->fatherdesc) ? $member->families->fatherdesc : "" }}" class="form-control" placeholder="{{translate('Father Description')}}" required>
                    @error('fatherdesc')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
              <div class="form-group row">
                <div class="col-md-6">
                    <label for="mother">{{translate('Mother')}}</label>
                    <input type="text" name="mother" value="{{ !empty($member->families->mother) ? $member->families->mother : "" }}" placeholder="{{ translate('Mother') }}" class="form-control" required>
                    @error('mother')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="motherdesc">{{translate('Mother Description')}}</label>
                    <input type="text" name="motherdesc" value="{{ !empty($member->families->motherdesc) ? $member->families->motherdesc : "" }}" class="form-control" placeholder="{{translate('Mother Description')}}" required>
                    @error('motherdesc')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-6">
                    <label for="sibling">{{translate('Sibling')}}</label>
                    <select class="form-control aiz-selectpicker" name="sibling" value="{{ !empty($member->families->sibling) ? $member->families->sibling : "" }}" class="form-control" placeholder="{{translate('Sibling')}}" required>
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                    </select>
                   <!--  <input type="text" name="sibling" value="{{ !empty($member->families->sibling) ? $member->families->sibling : "" }}" class="form-control" placeholder="{{translate('Sibling')}}" required> -->
                    @error('sibling')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="sibling_desc">{{translate('Sibling Description')}}</label>
                    <input type="text" name="sibling_desc" value="{{ !empty($member->families->sibling_desc) ? $member->families->sibling_desc : "" }}" class="form-control" placeholder="{{translate('Sibling Description')}}" required>
                    @error('sibling_desc')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-6">
                    <label for="father_number">{{translate('Father Contact')}}</label>
                    <input type="text" name="father_number" value="{{ !empty($member->families->father_number) ? $member->families->father_number : "" }}" class="form-control" placeholder="{{translate('Father Contact')}}" required>
                    @error('father_number')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                 <div class="col-md-6">
                    <label for="mother_number">{{translate('Mother Contact')}}</label>
                    <input type="text" name="mother_number" value="{{ !empty($member->families->mother_number) ? $member->families->mother_number : "" }}" class="form-control" placeholder="{{translate('Mother Contact')}}" required>
                    @error('mother_number')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="text-right">
                <button type="submit" class="btn btn-primary btn-sm">{{translate('Update')}}</button>
            </div>
        </form>
    </div>
</div>
