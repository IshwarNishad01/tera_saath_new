@extends('frontend.layouts.member_panel')
@section('panel_content')
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0 h6">{{ translate('My Shortlists') }}</h5>
        </div>
        <div class="card-body">
            <table class="table aiz-table mb-0">
              <thead>
                  <tr>
                      <th>#</th>
                      <th>{{translate('Image')}}</th>
                      <th>{{translate('Name')}}</th>
                      <th>{{translate('Age')}}</th>
                      @if(get_setting('member_spiritual_and_social_background_section') == 'on')
                      <th>{{translate('Religion')}}</th>
                      @endif
                      @if(get_setting('member_present_address_section') == 'on')
                      <th>{{translate('Location')}}</th>
                      @endif
                      @if(get_setting('member_language_section') == 'on')
                      <th>{{translate('Mother Tongue')}}</th>
                      @endif
                      <th class="text-right">{{translate('Options')}}</th>
                  </tr>
              </thead>
              <tbody>
                  @foreach ($shortlists as $key => $shortlist)
                      <tr id="shortlisted_member_{{ $shortlist->user_id }}">
                          <td>{{ ($key+1) + ($shortlists->currentPage() - 1)*$shortlists->perPage() }}</td>
                          <td>
                            <img class="img-md" src="{{ uploaded_asset($shortlist->user->photo) }}" height="45px"  alt="{{translate('photo')}}">
                          </td>
                          <td>{{ $shortlist->user->first_name.' '.$shortlist->user->last_name }}</td>
                          <td>{{ \Carbon\Carbon::parse($shortlist->user->member->birthday)->age }}</td>
                          @if(get_setting('member_spiritual_and_social_background_section') == 'on')
                          <td>
                            @if(!empty($shortlist->user->spiritual_backgrounds->religion_id))
                                {{ $shortlist->user->spiritual_backgrounds->religion->name }}
                            @endif
                          </td>
                          @endif
                          @if(get_setting('member_present_address_section') == 'on')
                          <td>
                            @php
                                $present_address = \App\Models\Address::where('type','present')->where('user_id', $shortlist->user_id)->first();
                            @endphp
                            @if(!empty($present_address->country_id))
                                {{ $present_address->country->name }}
                            @endif
                          </td>
                          @endif
                          @if(get_setting('member_language_section') == 'on')
                          <td>
                            @if($shortlist->user->member->mothere_tongue != null)
                                {{ \App\Models\MemberLanguage::where('id',$shortlist->user->member->mothere_tongue)->first()->name }}
                            @endif
                          </td>
                          @endif
                          <td class="text-right">
                              @php
                                $interest = \App\Models\ExpressInterest::where('user_id', $shortlist->user_id)->where('interested_by',Auth::user()->id)->first();
                              @endphp
                              @if(empty($interest))
                                <a href="avascript:void(0);" onclick="express_interest({{ $shortlist->user_id }})" id="interest_a_id_{{$shortlist->user_id}}" class="btn btn-soft-primary btn-icon btn-circle btn-sm" title="{{ translate('Express Interest') }}">
                                    <i class="las la-heart"></i>
                                </a>
                              @else
                                <a href="avascript:void(0);" class="btn btn-soft-success btn-icon btn-circle btn-sm" title="{{ translate('Interest Expressed') }}">
                                    <i class="las la-heart"></i>
                                </a>
                              @endif
                              <a onclick="remove_shortlist({{ $shortlist->user_id }})" class="btn btn-soft-danger btn-icon btn-circle btn-sm" title="{{ translate('Remove') }}">
                                  <i class="las la-trash-alt"></i>
                              </a>
                          </td>
                      </tr>
                  @endforeach
              </tbody>
            </table>
            <div class="aiz-pagination">
                {{ $shortlists->links() }}
            </div>
        </div>
    </div>
@endsection

@section('modal')
  @include('modals.confirm_modal')
@endsection

@section('script')
<script type="text/javascript">
    function remove_shortlist(id) {
      $.post('{{ route('member.remove_from_shortlist') }}',
        {
          _token: '{{ csrf_token() }}',
          id: id
        },
        function (data) {
          if (data == 1) {
            $("#shortlisted_member_"+id).hide();
            AIZ.plugins.notify('success', '{{translate('You Have Removed This Member From Shortlist')}}');
          }
          else {
            AIZ.plugins.notify('danger', '{{translate('Something went wrong')}}');
          }
        }
      );
    }

    // Express Interest
    var package_validity = {{ package_validity(Auth::user()->id) }};
    var remaining_interest = {{ get_remaining_value(Auth::user()->id,'remaining_interest') }};
    function express_interest(id)
    {
        if( package_validity == 0 || remaining_interest < 1){
            $('.package_update_alert_modal').modal('show');
        }
        else {
          $('.confirm_modal').modal('show');
          $("#confirm_modal_title").html("{{ translate('Confirm Express Interest') }}");
          $("#confirm_modal_content").html("<p class='fs-14'>{{translate('Remaining Express Interests')}}: "+remaining_interest+" {{translate('Times')}}</p><small class='text-danger'>{{translate('**N.B. Expressing An Interest Will Cost 1 From Your Remaining Interests**')}}</small>");
          $("#confirm_button").attr("onclick","do_express_interest("+id+")");
        }
    }

    function do_express_interest(id){
      $('.confirm_modal').modal('toggle');
      $("#interest_a_id_"+id).removeAttr("onclick");
      $.post('{{ route('express-interest.store') }}',
        {
          _token: '{{ csrf_token() }}',
          id: id
        },
        function (data) {
          if (data == 1) {
            $("#interest_a_id_"+id).attr("class","btn btn-soft-success btn-icon btn-circle btn-sm");
            $("#interest_a_id_"+id).attr("title","{{ translate('Interest Expressed') }}");
            AIZ.plugins.notify('success', '{{translate('Interest Expressed Sucessfully')}}');
          }
          else {
              AIZ.plugins.notify('danger', '{{translate('Something went wrong')}}');
          }
        }
      );
    }

</script>
@endsection
