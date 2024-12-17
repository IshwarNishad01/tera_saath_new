@extends('admin.layouts.app')

@section('content')
<div class="aiz-titlebar mt-2 mb-4">
    <div class="row align-items-center">
        <div class="col-md-6">
            <h1 class="h3">{{translate('Member Details')}}</h1>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-3">
        <div class="card">
            <div class="card-body text-center">
                <span class="avatar avatar-xl m-3 center">
                    @if(!uploaded_asset($member->photo))
                        <img src="{{ static_asset('assets/img/avatar-place.png')}}">
                    @else
                        <img src="{{ uploaded_asset($member->photo) }}">
                    @endif
                </span>
                <p>{{ $member->first_name.' '.$member->last_name }}</p>
                <div class="pad-ver btn-groups">
    				<a href="javascript:void(0);" onclick="package_info({{$member->id}})" class="btn btn-info btn-sm add-tooltip">{{ translate('Package') }}</i></a>
                    @if($member->blocked == 0)
                        <a href="javascript:void(0);" onclick="block_member({{$member->id}})" class="btn btn-dark btn-sm add-tooltip">{{ translate('Block') }}</i></a>
                    @elseif($member->blocked == 1)
                        <a href="javascript:void(0);" onclick="unblock_member({{$member->id}})" class="btn btn-dark btn-sm add-tooltip">{{ translate('Unblock') }}</i></a>
                    @endif
                    <br><br>
                    @if($member->deactivated == 0)
                        <span class="badge badge-inline badge-success">{{translate('Active Account')}}</span>
                    @else
                        <span class="badge badge-inline badge-danger">{{translate('Deactivated Account')}}</span>
                    @endif
                </div>
            </div>
        </div>
    </div>

   

    </div>
</div>
@endsection

@section('modal')
    {{-- Member Block Modal --}}
    <div class="modal fade member-block-modal" id="modal-basic">
    	<div class="modal-dialog">
    		<div class="modal-content">
                <form class="form-horizontal member-block" action="{{ route('members.block') }}" method="POST">
                    @csrf
                    <input type="hidden" name="member_id" id="member_id" value="">
                    <input type="hidden" name="block_status" id="block_status" value="">
                    <div class="modal-header">
                        <h5 class="modal-title h6">{{translate('Member Block !')}}</h5>
                        <button type="button" class="close" data-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">{{translate('Blocking Reason')}}</label>
                            <div class="col-md-9">
                                <textarea type="text" name="blocking_reason" class="form-control" placeholder="{{translate('Blocking Reason')}}" required></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-dismiss="modal">{{translate('Close')}}</button>
                        <button type="submit" class="btn btn-success">{{translate('Submit')}}</button>
                    </div>
                </form>
        	</div>
    	</div>
    </div>

    {{-- Member Unblock Modal --}}
    <div class="modal fade member-unblock-modal" id="modal-basic">
    	<div class="modal-dialog">
    		<div class="modal-content">
                <form class="form-horizontal member-block" action="{{ route('members.block') }}" method="POST">
                    @csrf
                    <input type="hidden" name="member_id" id="unblock_member_id" value="">
                    <input type="hidden" name="block_status" id="unblock_block_status" value="">
                    <div class="modal-header">
                        <h5 class="modal-title h6">{{translate('Member Unblock !')}}</h5>
                        <button type="button" class="close" data-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <p>
                            <b>{{translate('Blocked Reason')}} : </b>
                            <span id="block_reason">{{ $member->blocked_reason }}</span>
                        </p>
                        <p class="mt-1">{{translate('Are you want to unblock this member?')}}</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-dismiss="modal">{{translate('Close')}}</button>
                        <button type="submit" class="btn btn-success">{{translate('Unblock')}}</button>
                    </div>
                </form>
        	</div>
    	</div>
    </div>

    @include('modals.create_edit_modal')
@endsection

@section('script')
<script type="text/javascript">
    function package_info(id){
         $.post('{{ route('members.package_info') }}',{_token:'{{ @csrf_token() }}', id:id}, function(data){
             $('.create_edit_modal_content').html(data);
             $('.create_edit_modal').modal('show');
         });
     }

     function get_package(id){
         $.post('{{ route('members.get_package') }}',{_token:'{{ @csrf_token() }}', id:id}, function(data){
             $('.create_edit_modal_content').html(data);
             $('.create_edit_modal').modal('show');
         });
     }

     function block_member(id){
         $('.member-block-modal').modal('show');
         $('#member_id').val(id);
         $('#block_status').val(1);
     }

     function unblock_member(id){
         $('#unblock_member_id').val(id);
         $('#unblock_block_status').val(0);
         $.post('{{ route('members.blocking_reason') }}',{_token:'{{ @csrf_token() }}', id:id}, function(data){
             $('.member-unblock-modal').modal('show');
             $('#block_reason').html(data);
         });
     }

</script>
@endsection
