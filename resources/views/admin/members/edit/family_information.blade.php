<div class="card-header bg-dark text-white">
    <h5 class="mb-0 h6">{{translate('Family Information')}}</h5>
</div>
<div class="card-body">
    <form action="{{ route('families.update', $member->id) }}" method="POST">
        <input name="_method" type="hidden" value="PATCH">
        @csrf
        <div class="form-group row">
            <div class="col-md-6">
                <label for="father">{{translate('Father')}}</label>
                <input type="text" name="father" value="{{ !empty($member->families->father) ? $member->families->father : "" }}" class="form-control" placeholder="{{translate('Father')}}">
                @error('father')
                    <small class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="father">{{translate('Father Description')}}</label>
                <input type="text" name="fatherdesc" value="{{ !empty($member->families->fatherdesc) ? $member->families->fatherdesc : "" }}" class="form-control" placeholder="{{translate('Father Description')}}">
                @error('father description')
                    <small class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>
        
            <div class="col-md-6">
                <label for="mother">{{translate('Mother')}}</label>
                <input type="text" name="mother" value="{{ !empty($member->families->mother) ? $member->families->mother : "" }}" placeholder="{{ translate('Mother') }}" class="form-control">
                @error('mother')
                    <small class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="father">{{translate('Mother Description')}}</label>
                <input type="text" name="motherdesc" value="{{ !empty($member->families->motherdesc) ? $member->families->motherdesc : "" }}" class="form-control" placeholder="{{translate('Mother Description')}}">
                @error('mother description')
                    <small class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
       
        <div class="form-group row">
            <div class="col-md-6">
                <label for="sibling">{{translate('Sibling')}}</label>
                <input type="text" name="sibling" value="{{ !empty($member->families->sibling) ? $member->families->sibling : "" }}" class="form-control" placeholder="{{translate('Sibling')}}">
                @error('sibling')
                    <small class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="sibling">{{translate('Sibling Description')}}</label>
                <input type="text" name="sibling_desc" value="{{ !empty($member->families->sibling_desc) ? $member->families->sibling_desc : "" }}" class="form-control" placeholder="{{translate('Sibling Description')}}">
                @error('sibling description')
                    <small class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-6">
                <label for="sibling">{{translate('Father Contact')}}</label>
                <input type="text" name="father_number" value="{{ !empty($member->families->father_number) ? $member->families->father_number : "" }}" class="form-control" placeholder="{{translate('Father Contact')}}">
                @error('father contact')
                    <small class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="sibling">{{translate('Mother Contact')}}</label>
                <input type="text" name="mother_number" value="{{ !empty($member->families->mother_number) ? $member->families->mother_number : "" }}" class="form-control" placeholder="{{translate('Mother Contact')}}">
                @error('mother contact')
                    <small class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="text-right">
            <button type="submit" class="btn btn-info btn-sm">{{translate('Update')}}</button>
        </div>
    </form>
</div>
