<div class="card-header bg-dark text-white">
    <h5 class="mb-0 h6">{{translate('Lifestyle')}}</h5>
</div>
<div class="card-body">
    <form action="{{ route('lifestyles.update', $member->id) }}" method="POST">
        <input name="_method" type="hidden" value="PATCH">
        @csrf
        <!-- <div class="form-group row">
            <div class="col-md-6">
                <label for="diet">{{translate('Diet')}}</label>
                <input type="text" name="diet" value="{{ !empty($member->lifestyles->diet) ? $member->lifestyles->diet : "" }}" class="form-control" placeholder="{{translate('Diet')}}">
                @error('diet')
                    <small class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="drink">{{translate('Drink')}}</label>
                <input type="text" name="drink" value="{{ !empty($member->lifestyles->drink) ? $member->lifestyles->drink : "" }}" placeholder="{{ translate('Drink') }}" class="form-control">
                @error('drink')
                    <small class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div> -->
        <div class="form-group row">
            <div class="col-md-6">
                <label for="smoke">{{translate('Veg./Non-Veg.')}}</label>
                <select class="form-control" name="smoke">
                    <option>Select Option</option>
                    <option value="Vegetarian">Vegetarian</option>
                    <option value="Non-Vegetarian">Non-Vegetarian</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="living_with">{{translate('Living With')}}</label>
                <input type="text" name="living_with" value="{{ !empty($member->lifestyles->living_with) ? $member->lifestyles->living_with : "" }}" placeholder="{{ translate('Living With') }}" class="form-control">
                @error('living_with')
                    <small class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="text-right">
            <button type="submit" class="btn btn-info btn-sm">{{translate('Update')}}</button>
        </div>
    </form>
</div>
