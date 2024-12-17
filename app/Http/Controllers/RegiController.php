<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\OTPVerificationController;
use App\Providers\RouteServiceProvider;
use App\User;
use App\Models\Member;
use App\Models\Package;
use App\Models\Setting;
use App\Models\EmailTemplate;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Mail;
use App\Mail\EmailManager;
use Notification;
use App\Notifications\DbStoreNotification;
use App\Utility\EmailUtility;
use App\Utility\SmsUtility;

class RegiController extends Controller
{

	public function frontregi(){

		return view('frontend.frontregister');
	}



    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name'  => ['required', 'string', 'max:255'],
            'last_name'   => ['required', 'string', 'max:255'],
            'password'    => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $approval = get_setting('member_approval_by_admin') == 1 ? 0 : 1;
        if (filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $user = User::create([
                'first_name'  => $data['first_name'],
                'last_name'   => $data['last_name'],
                'email'       => $data['email'],
                'password'    => Hash::make($data['password']),
                'code'        => unique_code(),
                'marital_status' => $data['marital_status'],
                'children' => $data['children'],
                'country' => $data['country'],
                'state' => $data['state'],
                'city' => $data['city'],
                'postal_code' => $data['postal_code'],
                'degree' => $data['degree'],
                'institute' => $data['institute'],
                'designation' => $data['designation'],
                'company' => $data['company'],
                'approved'    => $approval,
            ]);
        }
        else{
            if(addon_activation('otp_system'))
            {
                $user = User::create([
                    'first_name'  => $data['first_name'],
                    'last_name'   => $data['last_name'],
                    'phone'       => '+'.$data['country_code'].$data['phone'],
                    'password'    => Hash::make($data['password']),
                    'code'        => unique_code(),
                    'marital_status' => $data['marital_status'],
                'children' => $data['children'],
                'country' => $data['country'],
                'state' => $data['state'],
                'city' => $data['city'],
                'postal_code' => $data['postal_code'],
                'degree' => $data['degree'],
                'institute' => $data['institute'],
                'designation' => $data['designation'],
                'company' => $data['company'],
                    'approved'    => $approval,
                ]);
            }
        }

        $member                             = new Member;
        $member->user_id                    = $user->id;
        $member->gender                     = $data['gender'];
        $member->on_behalves_id             = $data['on_behalf'];
        $member->birthday                   = date('Y-m-d', strtotime($data['date_of_birth']));
        // $member->marital_status             = $request->marital_status;
        //     $member->children                   = $request->children;
        //     $member->country                    = $request->country;
        //     $member->state                      = $request->state;
        //     $member->city                       = $request->city;
        //     $member->postal_code                = $request->postal_code;
        //     $member->degree                     = $request->degree;
        //     $member->institute                  = $request->institute;
        //     $member->designation                = $request->designation;
        //     $member->company                    = $request->company;
        $package                            = Package::where('id',1)->first();
        $member->current_package_id         = $package->id;
        $member->remaining_interest         = $package->express_interest;
        $member->remaining_contact_view     = $package->contact;
        $member->remaining_photo_gallery    = $package->photo_gallery;
        $member->auto_profile_match         = $package->auto_profile_match;
        $member->profile_picture_privacy    = 1;
        $member->gallery_image_privacy      = 1;
        $member->package_validity           = Date('Y-m-d', strtotime($package->validity." days"));
        $member->save();

        if(addon_activation('otp_system') && $data['phone'] != null)
        {
            $otpController = new OTPVerificationController;
            // $otpController->send_code($user);
        }

        // Email to member
        if($data['email'] != null  && env('MAIL_USERNAME') != null)
        {
            $account_oppening_email = EmailTemplate::where('identifier','account_oppening_email')->first();
            if($account_oppening_email->status == 1)
            {
                EmailUtility::account_oppening_email($user, $data['password']);
            }
        }

        return $user;

    }

    public function register(Request $request)
    {
        if (filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
            if(User::where('email', $request->email)->first() != null){
                flash(translate('Email or Phone already exists.'));
                return back();
            }
        }
        elseif (User::where('phone', '+'.$request->country_code.$request->phone)->first() != null) {
            flash(translate('Phone already exists.'));
            return back();
        }

        $this->validator($request->all())->validate();

        $user = $this->create($request->all());

        if(get_setting('member_approval_by_admin') != 1 )
        {
          $this->guard()->login($user);
        }

        try{
            $notify_type = 'member_registration';
            $id = unique_notify_id();
            $notify_by = $user->id;
            $info_id = $user->id;
            $message = translate('A new member has been registered to your system. Name: ').$user->first_name.' '.$user->last_name;
            $route = 'members.index';

            Notification::send(User::where('user_type', 'admin')->first(), new DbStoreNotification($notify_type, $id, $notify_by, $info_id, $message, $route));
        }
        catch(\Exception $e){
            // dd($e);
        }

        if($user->email != null  && env('MAIL_USERNAME') != null && (get_email_template('account_opening_email_to_admin','status') == 1))
        {
            $admin = User::where('user_type', 'admin')->first();
            EmailUtility::account_opening_email_to_admin($user, $admin);
        }


        if($user->email != null){
            if(get_setting('email_verification') != 1){
                $user->email_verified_at = date('Y-m-d H:m:s');
                $user->save();
                flash(translate('Registration successfull.'))->success();
            }
            else {
                event(new Registered($user));
                flash(translate('Registration successfull. Please verify your email.'))->success();
            }
        }
        if($user->phone != null){
          flash(translate('Registration successfull. Please verify your phone number.'))->success();
        }

        return $this->registered($request, $user)
            ?: redirect($this->redirectPath());
    }

    protected function registered(Request $request, $user)
    {
        if(get_setting('member_approval_by_admin') == 1 )
        {
          return redirect()->route('home');
        }
        else {
          return redirect()->route('dashboard');
        }
    }

}