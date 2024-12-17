<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Auth\Events\PasswordReset;
use App\User;
use Auth;
use Nexmo;
use App\OtpConfiguration;
use Twilio\Rest\Client;
use Hash;
use App\Models\SmsTemplate;
use App\Utility\SmsUtility;

class OTPVerificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function verification(Request $request){
        if (Auth::check() && Auth::user()->email_verified_at == null) {
            return view('addons.otp_systems.frontend.user_verification');
        }
        else {
            flash('You have already verified your number')->warning();
            return redirect()->route('home');
        }
    }


    /**
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function verify_phone(Request $request){
        $user = Auth::user();
        if ($user->verification_code == $request->verification_code) {
            $user->email_verified_at = date('Y-m-d h:m:s');
            $user->save();

            flash('Your phone number has been verified successfully')->success();
            return redirect()->route('home');
        }
        else{
            flash('Invalid Code')->error();
            return back();
        }
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function resend_verificcation_code(Request $request){
        $user = Auth::user();
        $user->verification_code = rand(100000,999999);
        $user->save();

        $otp = $user->verification_code;
            $num = $user->phone;
            $result = substr($num, 3);

            $curl = curl_init();

            $fields = array(
                    "variables_values" => $otp,
                    "route" => "otp",
                    "numbers" => $result,
                );

                $curl = curl_init();

                curl_setopt_array($curl, array(
                    CURLOPT_URL => "https://www.fast2sms.com/dev/bulkV2",
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => "",
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 30,
                    CURLOPT_SSL_VERIFYHOST => 0,
                    CURLOPT_SSL_VERIFYPEER => 0,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => "POST",
                    CURLOPT_POSTFIELDS => json_encode($fields),
                    CURLOPT_HTTPHEADER => array(
                    "authorization: R9vgbjlqexkVJoFmrIa3fBOKy16X7CzTYShG2t4HWcQuNPsApUcXVIdSgMiJ9tzP0qk8j1YpnTsHZA7a",
                    "accept: */*",
                    "cache-control: no-cache",
                    "content-type: application/json"),
                ));

                $response = curl_exec($curl);
                $err = curl_error($curl);

                curl_close($curl);

                if ($err) {
                  echo "cURL Error #:" . $err;
                } else {
                  echo $response;
                  
                }


        SmsUtility::mobile_number_verification($user);
        return back();
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function reset_password_with_code(Request $request){

        // echo "harshi";exit();
        if (($user = User::where('phone', $request->phone)->where('verification_code', $request->code)->first()) != null) {
            if($request->password == $request->password_confirmation){
                $user->password = Hash::make($request->password);
                $user->email_verified_at = date('Y-m-d h:m:s');
                $user->save();
                
                auth()->login($user, true);

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

    /**
     * @param  User $user
     * @return void
     */

    public function send_code($user){
        $user->verification_code = rand(100000,999999);
        $user->save();

        $otp = $user->verification_code;
            $num = $user->phone;
            $result = substr($num, 3);

            $curl = curl_init();

            $fields = array(
                    "variables_values" => $otp,
                    "route" => "otp",
                    "numbers" => $result,
                );

                $curl = curl_init();

                curl_setopt_array($curl, array(
                    CURLOPT_URL => "https://www.fast2sms.com/dev/bulkV2",
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => "",
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 30,
                    CURLOPT_SSL_VERIFYHOST => 0,
                    CURLOPT_SSL_VERIFYPEER => 0,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => "POST",
                    CURLOPT_POSTFIELDS => json_encode($fields),
                    CURLOPT_HTTPHEADER => array(
                    "authorization: R9vgbjlqexkVJoFmrIa3fBOKy16X7CzTYShG2t4HWcQuNPsApUcXVIdSgMiJ9tzP0qk8j1YpnTsHZA7a",
                    "accept: */*",
                    "cache-control: no-cache",
                    "content-type: application/json"),
                ));

                $response = curl_exec($curl);
                $err = curl_error($curl);

                curl_close($curl);

                if ($err) {
                  echo "cURL Error #:" . $err;
                } else {
                  echo $response;
                  
                }

        SmsUtility::mobile_number_verification($user);
    }
}
