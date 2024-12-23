<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Models\Package;
use App\Models\Member;
use App\User;
use Socialite;
use CoreComponentRepository;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //protected $redirectTo = RouteServiceProvider::HOME;

    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback(Request $request, $provider)
    {
        try {
            if($provider == 'twitter'){
                $user = Socialite::driver('twitter')->user();
            }
            else{
                $user = Socialite::driver($provider)->stateless()->user();
            }
        } catch (\Exception $e) {
            flash("Something Went wrong. Please try again.")->error();
            return redirect()->route('user.login');
        }
        // check if they're an existing user
        $existingUser = User::where('provider_id', $user->id)->orWhere('email', $user->email)->first();

        if($existingUser){
            // log them in
            auth()->login($existingUser, true);
        } else {

            // create a new user
            $newUser                     = new User;
            $newUser->first_name         = $user->name;
            $newUser->email              = $user->email;
            $newUser->email_verified_at  = date('Y-m-d H:m:s');
            $newUser->provider_id        = $user->id;
            $newUser->code               = unique_code();
            $newUser->membership         = 1;
            $newUser->approved           = get_setting('member_approval_by_admin') == 1 ? 0 : 1;
            $newUser->save();

            $member                             = new Member;
            $member->user_id                    = $newUser->id;
            $member->gender                     = null;
            $member->on_behalves_id             = null;
            $member->birthday                   = null;

            $package                            = Package::where('id',1)->first();
            $member->current_package_id         = $package->id;
            $member->remaining_interest         = $package->express_interest;
            $member->remaining_contact_view     = $package->contact;
            $member->remaining_photo_gallery    = $package->photo_gallery;
            $member->auto_profile_match         = $package->auto_profile_match;
            $member->package_validity           = Date('Y-m-d', strtotime($package->validity." days"));
            $member->save();

            return redirect()->route('user.login');
            //auth()->login($newUser, true);
        }
        if(session('link') != null){
            return redirect(session('link'));
        }
        else{
            return redirect()->route('dashboard');
        }
    }


    /**
     * Get the needed authorization credentials from the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    protected function credentials(Request $request)
    {
        
        if(filter_var($request->get('email'), FILTER_VALIDATE_EMAIL)){
        
           return $request->only($this->username(), 'password');
           
        }
        else {

            return ['phone'=>$request->get('email'),'password'=>$request->get('password')];
            // $user = User::where('phone', $request->get('email'))->first();

            // $otp = $user->verification_code;
            // $num = $request->get('email');
            // $result = substr($num, 3);

            // $curl = curl_init();

            // $fields = array(
            //         "variables_values" => $otp,
            //         "route" => "otp",
            //         "numbers" => $result,
            //     );

            //     $curl = curl_init();

            //     curl_setopt_array($curl, array(
            //         CURLOPT_URL => "https://www.fast2sms.com/dev/bulkV2",
            //         CURLOPT_RETURNTRANSFER => true,
            //         CURLOPT_ENCODING => "",
            //         CURLOPT_MAXREDIRS => 10,
            //         CURLOPT_TIMEOUT => 30,
            //         CURLOPT_SSL_VERIFYHOST => 0,
            //         CURLOPT_SSL_VERIFYPEER => 0,
            //         CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            //         CURLOPT_CUSTOMREQUEST => "POST",
            //         CURLOPT_POSTFIELDS => json_encode($fields),
            //         CURLOPT_HTTPHEADER => array(
            //         "authorization: R9vgbjlqexkVJoFmrIa3fBOKy16X7CzTYShG2t4HWcQuNPsApUcXVIdSgMiJ9tzP0qk8j1YpnTsHZA7a",
            //         "accept: */*",
            //         "cache-control: no-cache",
            //         "content-type: application/json"),
            //     ));

            //     $response = curl_exec($curl);
            //     $err = curl_error($curl);

            //     curl_close($curl);

            //     if ($err) {
            //       echo "cURL Error #:" . $err;
            //     } else {
            //       echo $response;
                  
            //     }
            
        }

    }

    public function authenticated()
    {
        if(auth()->user()->user_type == 'admin' || auth()->user()->user_type == 'staff')
        {
            return redirect()->route('admin.dashboard');
        }
        else {
            if(session('link') != null){
                return redirect(session('link'));
            }
            else{
                return redirect("/profile-settings");
            }
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    public function showLoginForm()
    {
        return view('frontend.user_login');
    }


    public function logout(Request $request)
    {
        if(auth()->user() != null && (auth()->user()->user_type == 'admin' || auth()->user()->user_type == 'staff')){
            $redirect_route = 'admin';
        }
        else{
            $redirect_route = 'home';
        }

        $this->guard()->logout();

        $request->session()->invalidate();

        return $this->loggedOut($request) ?: redirect()->route($redirect_route);
    }
}
