<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use App\Utility\EmailUtility;
use App\Utility\SmsUtility;
use Illuminate\Http\Request;
use App\User;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    /**
     * Send a reset link to the given user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */

    public function sendResetLinkEmail(Request $request)
    {
        if (filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
            $user = User::where('email', $request->email)->first();
            if ($user != null) {
                $user->verification_code = rand(100000,999999);
                $user->save();

                EmailUtility::password_reset_email($user, $user->verification_code);
                return view('auth.passwords.reset');
            }
            else {
                flash(translate('No account exists with this email'))->error();
                return back();
            }
        }
        else{
            $user = User::where('phone', $request->email)->first();
            $num = $request->email;
            if ($user != null) {
                $user->verification_code = rand(100000,999999);
                $user->save();

                $country_code = '91';
                $otp = $user->verification_code;
                // $result = ltrim( preg_replace("/[^0-9]+/", "",$num) , $country_code);
                $result = substr($num, 3);



                $curl = curl_init();
                $message = "Your forgot password otp is : ".$otp;



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
                
                  return view('auth.passwords.resetphone');
                }
                
            }
            else {
                flash(translate('No account exists with this phone number'))->error();
                return back();
            }
        }
    }
}
