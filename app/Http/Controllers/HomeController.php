<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Mail\SecondEmailVerifyMailManager;
use Mail;
use Auth;
use App\User;
use App\Models\Member;
use App\Models\Matrimonial;
use App\Models\PhysicalAttribute;
use App\Models\SpiritualBackground;
use App\Models\Career;
use App\Models\Address;
use App\Models\HappyStory;
use App\Models\IgnoredUser;
use App\Models\ProfileMatch;
use App\Models\Users;
use Hash;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
// use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $members = User::where('user_type','member')
            ->where('approved', 1)
            ->where('blocked', 0)
            ->where('deactivated',0);

        if(Auth::user() && Auth::user()->user_type == 'member')
        {
            $members = $members->where('id', '!=', Auth::user()->id)
                ->whereIn("id", function ($query){
                    $query->select('user_id')
                        ->from('members')
                        ->where('gender','!=', Auth::user()->member->gender);});

            $ignored_to = IgnoredUser::where('ignored_by', Auth::user()->id)->pluck('user_id')->toArray();
            if(count($ignored_to) >0){
                $members = $members->whereNotIn('id', $ignored_to);
            }

            $ignored_by_ids = IgnoredUser::where('user_id', Auth::user()->id)->pluck('ignored_by')->toArray();
            if(count($ignored_by_ids) >0){
                $members = $members->whereNotIn('id', $ignored_by_ids);
            }
        }

        $premium_members = $members;
        $new_members = $members;

        $new_members = $new_members->orderBy('id','desc')->limit(get_setting('max_new_member_show_homepage'))->get()->shuffle();
        $premium_members = $premium_members->where('membership',2)->inRandomOrder()->limit(get_setting('max_premium_member_homepage'))->get();


        return view('frontend.index', compact('premium_members','new_members'));
    }


    public function admin_login()
    {
        if(auth()->user() != null && (auth()->user()->user_type == 'admin' || auth()->user()->user_type == 'staff'))
        {
            return redirect()->route('admin.dashboard');
        }
        else
        {
            return view("auth.login");
        }

    }

    public function login()
    {
        if(Auth::check()){
            return redirect()->route('home');
            
        }
        return view('frontend.user_login');
    }


    public function admin_dashboard()
    {
        return view('admin.dashboard');
    }



    // Manage Admin Profile
    public function admin_profile_update(Request $request, $id)
    {
        $admin = User::findOrFail($id);
        $admin->first_name = $request->first_name;
        $admin->last_name = $request->last_name;
        if ($request->new_password != null && ($request->new_password == $request->confirm_password)) {
            $admin->password = Hash::make($request->new_password);
        }
        //$admin->save();
        if ($admin->save()) {
            flash(translate('Your Profile has been updated successfully!'))->success();
            return back();
        }

        flash(translate('Sorry! Something went wrong.'))->error();
        return back();
    }

    public function dashboard()
    {
        if(Auth::user()->user_type == 'member'){

            $similar_profiles = ProfileMatch::orderBy('match_percentage', 'desc')
                ->limit(20)
                ->where('user_id', Auth::user()->id);

            $ignored_to = IgnoredUser::where('ignored_by', Auth::user()->id)->pluck('user_id')->toArray();
            if(count($ignored_to) >0){
                $similar_profiles = $similar_profiles->whereNotIn('match_id', $ignored_to);
            }
            $ignored_by_ids = IgnoredUser::where('user_id', Auth::user()->id)->pluck('ignored_by')->toArray();
            if(count($ignored_by_ids) >0){
                $similar_profiles = $similar_profiles->whereNotIn('match_id', $ignored_by_ids);
            }
            $similar_profiles = $similar_profiles->get();

            return view('frontend.member.dashboard', compact('similar_profiles'));
        }
        else {
            abort(404);
        }
    }

    public function user_account_blocked()
    {
        return view('frontend.user_account_blocked_msg');
    }

    public function happy_stories()
    {
        $happy_stories = HappyStory::where('approved', 1)->latest()->paginate(12);
        return view('frontend.happy_stories.index', compact('happy_stories'));
    }

    public function story_details($id)
    {
        $happy_story = HappyStory::findOrFail($id);
        return view('frontend.happy_stories.story_details', compact('happy_story'));
    }

    public function member_listing(Request $request)
{
    // Fetch filter criteria from request
    $age_from       = $request->age_from;
    $age_to         = $request->age_to;
    $member_code    = $request->member_code;
    $matital_status = $request->marital_status;
    $religion_id    = $request->religion_id;
    $caste_id       = $request->caste_id;
    $sub_caste_id   = $request->sub_caste_id;
    $mother_tongue  = $request->mother_tongue;
    $profession     = $request->profession;
    $country_id     = $request->country_id;
    $state_id       = $request->state_id;
    $city_id        = $request->city_id;
    $min_height     = str_replace(['\'', '"'], ['.', ''], $request->min_height);
    $max_height     = str_replace(['\'', '"'], ['.', ''], $request->max_height);
    $member_type    = $request->member_type ?? 0;

    $users = User::orderBy('created_at', 'desc')
        ->where('user_type', 'member')
        ->where('id', '!=', Auth::user()->id)
        ->where('blocked', 0)
        ->where('deactivated', 0);

    // Gender check
    $user_ids = Member::where('gender', '!=', Auth::user()->member->gender)->pluck('user_id')->toArray();
    if (count($user_ids) > 0) {
        $users = $users->whereIn('id', $user_ids);
    }

    // Ignored member check
    $users = $users->whereNotIn('id', function ($query) {
        $query->select('user_id')
            ->from('ignored_users')
            ->where('ignored_by', Auth::user()->id)
            ->orWhere('user_id', Auth::user()->id);
    })->whereNotIn('id', function ($query) {
        $query->select('ignored_by')
            ->from('ignored_users')
            ->where('ignored_by', Auth::user()->id)
            ->orWhere('user_id', Auth::user()->id);
    });

    // Membership check
    if (in_array($member_type, [1, 2])) {
        $users = $users->where('membership', $member_type);
    }

    // Member approved check
    if (get_setting('member_approval_by_admin') == 1) {
        $users = $users->where('approved', 1);
    }

    // Age filter
    if (!empty($age_from)) {
        $start = date('Y-m-d', strtotime("-$age_from years"));
        $user_ids = Member::where('birthday', '<=', $start)->pluck('user_id')->toArray();
        if (count($user_ids) > 0) {
            $users = $users->whereIn('id', $user_ids);
        }
    }
    if (!empty($age_to)) {
        $end = date('Y-m-d', strtotime("-$age_to years +1 day"));
        $user_ids = Member::where('birthday', '>=', $end)->pluck('user_id')->toArray();
        if (count($user_ids) > 0) {
            $users = $users->whereIn('id', $user_ids);
        }
    }

    // Member code filter
    if (!empty($member_code)) {
        $users = $users->where('code', $member_code);
    }

    // Marital status filter
    if ($matital_status != null) {
        $user_ids = Member::whereIn('marital_status_id', $matital_status)->pluck('user_id')->toArray();
        if (count($user_ids) > 0) {
            $users = $users->whereIn('id', $user_ids);
        }
    }

    // Religion, caste, sub-caste filter
    if (!empty($sub_caste_id)) {
        $user_ids = SpiritualBackground::where('sub_caste_id', $sub_caste_id)->pluck('user_id')->toArray();
        $users = $users->whereIn('id', $user_ids);
    } elseif (!empty($caste_id)) {
        $user_ids = SpiritualBackground::where('caste_id', $caste_id)->pluck('user_id')->toArray();
        $users = $users->whereIn('id', $user_ids);
    } elseif (!empty($religion_id)) {
        $user_ids = SpiritualBackground::where('religion_id', $religion_id)->pluck('user_id')->toArray();
        $users = $users->whereIn('id', $user_ids);
    }

    // Profession filter
    if (!empty($profession)) {
        $user_ids = Career::where('designation', 'like', '%' . $profession . '%')->pluck('user_id')->toArray();
        $users = $users->whereIn('id', $user_ids);
    }

    // Location filter
    if (!empty($city_id)) {
        $user_ids = Address::where('city_id', $city_id)->pluck('user_id')->toArray();
        $users = $users->whereIn('id', $user_ids);
    } elseif (!empty($state_id)) {
        $user_ids = Address::where('state_id', $state_id)->pluck('user_id')->toArray();
        $users = $users->whereIn('id', $user_ids);
    } elseif (!empty($country_id)) {
        $user_ids = Address::where('country_id', $country_id)->pluck('user_id')->toArray();
        $users = $users->whereIn('id', $user_ids);
    }

    // Mother tongue filter
    if ($mother_tongue != null) {
        $user_ids = Member::where('mothere_tongue', $mother_tongue)->pluck('user_id')->toArray();
        if (count($user_ids) > 0) {
            $users = $users->whereIn('id', $user_ids);
        }
    }

    // Height filter
    if (!empty($min_height)) {
        $user_ids = PhysicalAttribute::where('height', '>=', $min_height)->pluck('user_id')->toArray();
        if (count($user_ids) > 0) {
            $users = $users->whereIn('id', $user_ids);
        }
    }
    if (!empty($max_height)) {
        $user_ids = PhysicalAttribute::where('height', '<=', $max_height)->pluck('user_id')->toArray();
        if (count($user_ids) > 0) {
            $users = $users->whereIn('id', $user_ids);
        }
    }

    // Paginate results
    $users = $users->paginate(10);

    // Append query parameters to pagination links
    $users->appends($request->all());

    return view('frontend.member.member_listing.index', compact('users', 'age_from', 'age_to', 'member_code', 'matital_status', 'religion_id', 'caste_id', 'sub_caste_id', 'mother_tongue', 'profession', 'country_id', 'state_id', 'city_id', 'min_height', 'max_height', 'member_type'));
}


    // My shortlistd
    public function my_shortlists(){
        $shortlists = Member::where('user_id', Auth::user()->id)->first()->short_listed_users;
        return view('frontend.member.my_shortlists', compact('shortlists'));
    }

    public function view_member_profile($id){
        $similar_profiles = ProfileMatch::orderBy('match_percentage', 'desc')
            ->limit(20)
            ->where('user_id', Auth::user()->id)
            ->where('match_id','!=',$id);

        $ignored_to = IgnoredUser::where('ignored_by', Auth::user()->id)->pluck('user_id')->toArray();
        if(count($ignored_to) >0){
            $similar_profiles = $similar_profiles->whereNotIn('match_id', $ignored_to);
        }

        $ignored_by_ids = IgnoredUser::where('user_id', Auth::user()->id)->pluck('ignored_by')->toArray();
        if(count($ignored_by_ids) >0){
            $similar_profiles = $similar_profiles->whereNotIn('match_id', $ignored_by_ids);
        }
        $similar_profiles = $similar_profiles->get();

        // dd($similar_profiles);
        $user = User::findOrFail($id);
        return view('frontend.member.public_profile.index', compact('user','similar_profiles'));
    }

    // Ajax call
    public function new_verify(Request $request)
    {
        $email = $request->email;
        if(User::where('email',$email)->count() == 0 ){
            $response['status'] = 2;
            $response['message'] = 'Email already exists!';
            return json_encode($response);
        }

        $response = $this->send_email_change_verification_mail($request, $email);
        return json_encode($response);
    }

    // Form request
    public function update_email(Request $request)
    {
        $email = $request->email;
        if(User::where('email',$email)->count() == 0 ){
            $this->send_email_change_verification_mail($request, $email);
            flash(translate('A verification mail has been sent to the mail you provided us with.'))->success();
            return back();
        }

        flash(translate('Email already exists!'))->warning();
        return back();
    }

    public function send_email_change_verification_mail($request, $email)
    {
        $response['status'] = 0;
        $response['message'] = 'Unknown';

        $verification_code = Str::random(32);

        $array['subject'] = 'Email Verification';
        $array['from'] = env('MAIL_USERNAME');
        $array['content'] = 'Verify your account';
        $array['link'] = route('email_change.callback').'?new_email_verificiation_code='.$verification_code.'&email='.$email;
        $array['sender'] = Auth::user()->name;
        $array['details'] = "Email Second";

        $user = Auth::user();
        $user->new_email_verificiation_code = $verification_code;
        $user->save();

        try {
            Mail::to($email)->queue(new SecondEmailVerifyMailManager($array));

            $response['status'] = 1;
            $response['message'] = translate("Your verification mail has been Sent to your email.");

        } catch (\Exception $e) {
            return $e->getMessage();
            $response['status'] = 0;
            $response['message'] = $e->getMessage();
        }

        return $response;
    }

    public function email_change_callback(Request $request){

        if($request->has('new_email_verificiation_code') && $request->has('email')) {

            $verification_code_of_url_param =  $request->input('new_email_verificiation_code');
            $user = User::where('new_email_verificiation_code', $verification_code_of_url_param)->first();

            if($user != null) {

                $user->email = $request->input('email');
                $user->new_email_verificiation_code = null;
                $user->save();

                auth()->login($user, true);

                flash(translate('Email Changed successfully'))->success();
                return redirect()->route('dashboard');
            }
        }

        flash(translate('Email was not verified. Please resend your mail!'))->error();
        return redirect()->route('dashboard');

    }

    public function reset_password_with_code(Request $request){
        if (($user = User::where('email', $request->email)->where('verification_code', $request->code)->first()) != null) {
            if($request->password == $request->password_confirmation){
                $user->password = Hash::make($request->password);
                $user->email_verified_at = date('Y-m-d h:m:s');
                $user->save();
                auth()->login($user, true);

                flash(translate('Password updated successfully'))->success();

                if(auth()->user()->user_type == 'admin' || auth()->user()->user_type == 'staff')
                {
                    return redirect()->route('admin.dashboard');
                }
                return redirect()->route('home');
            }
            else {
                flash("Password and confirm password didn't match")->warning();
                return back();
            }
        }
        else {
            flash("Verification code mismatch")->error();
            return back();
        }
    }

    public function reset_password_with_phone_code(Request $request){
        if (($user = User::where('email', $request->email)->where('verification_code', $request->code)->first()) != null) {
            if($request->password == $request->password_confirmation){
                $user->password = Hash::make($request->password);
                $user->email_verified_at = date('Y-m-d h:m:s');
                $user->save();
                auth()->login($user, true);

                flash(translate('Password updated successfully'))->success();

                if(auth()->user()->user_type == 'admin' || auth()->user()->user_type == 'staff')
                {
                    return redirect()->route('admin.dashboard');
                }
                return redirect()->route('home');
            }
            else {
                flash("Password and confirm password didn't match")->warning();
                return back();
            }
        }
        else {
            flash("Verification code mismatch")->error();
            return back();
        }
    }

    public function check()
    {
        //
    }

    public function matrimonial_form(){
        return view('frontend.form_matrimonial');
    }

    public function form_matrimonials(Request $request){
        //echo "kafjkjsdfjk";
         $pimage="";
         $person_name = $request->person_name;
         $person_contact_no = $request->person_contact_no;
         $person_email_address = $request->person_email_address;
         $person_birthday = $request->person_birthday;
         $person_birthtime = $request->person_birthtime;
         $person_birthplace = $request->person_birthplace;
         $person_gender = $request->person_gender;
         // $person_baptism = $request->person_baptism;
         $person_height = $request->person_height;
         $person_hobbies = $request->person_hobbies;
         $person_cast = $request->person_cast;
         $person_lang = $request->person_lang;
         $person_qualification = $request->person_qualification;
         $person_job = $request->person_job;
         $person_city = $request->person_city;
         $person_marital = $request->person_marital;
         $person_monthly_income = $request->person_monthly_income;
         $person_fname = $request->person_fname;
         $person_mname = $request->person_mname;
         $person_sibling = $request->person_sibling;
         $person_address = $request->person_address;
         // $person_pastorname = $request->person_pastorname;
         // $person_church = $request->person_church;
         // $person_denomination = $request->person_denomination;
         $person_preference = $request->person_preference;

        // $request->validate([
        //   'person_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        // ]);

       if ($request->hasFile('person_image')) {
        $imagep = $request->file('person_image');
        $destinationPath = public_path('/storage/personImages/');
        $pimage = time().'.'.$imagep->getClientOriginalExtension();
        $imagep->move($destinationPath, $pimage);
        
      }

         // $mdata= array('person_name' =>$person_name);
         $matrim_data=array('person_name'=>$person_name,'person_contact_no'=>$person_contact_no,'person_email_address'=>$person_email_address,'person_image'=>$pimage,'person_birthday'=>$person_birthday,'person_birthtime'=>$person_birthtime,'person_birthplace'=>$person_birthplace,'person_gender'=>$person_gender,'person_height'=>$person_height,'person_hobbies'=>$person_hobbies,'person_cast'=>$person_cast,'person_lang'=>$person_lang,'person_qualification'=>$person_qualification,'person_job'=>$person_job,'person_city'=>$person_city,'person_marital'=>$person_marital,'person_monthly_income'=>$person_monthly_income,'person_fname'=>$person_fname,'person_mname'=>$person_mname,'person_sibling'=>$person_sibling, 'person_address'=>$person_address ,'person_preference'=>$person_preference);
        
        // print_r($matrim_data);exit();
        
          DB::table('matrimonial_data')->insert($matrim_data);

        //print_r($matrim_data);

         return redirect('/payment')->with('success','Submitted Successfully');
    }

    public function payment(){
        return view('frontend.payment');
    }
}
