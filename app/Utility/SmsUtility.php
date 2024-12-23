<?php
namespace App\Utility;

use App\Models\SmsTemplate;
use App\User;

class SmsUtility
{
    public static function mobile_number_verification($user = '')
    {
        $sms_body = get_sms_template('mobile_number_verification','sms_body');
        $sms_body = str_replace('[[code]]', $user->verification_code, $sms_body);
        $sms_body = str_replace('[[site_name]]', get_setting('website_name'), $sms_body);
        $sms_body = str_replace('[[url]]', env('APP_URL'), $sms_body);
        $sms_content = view('sms.index',['sms_body'=>$sms_body]);
        try {
            sendSMS($user->phone, env('APP_NAME'),strip_tags($sms_body) );
        } catch (\Exception $e) {
          
        }
    }

    public static function account_opening_by_admin($user = '', $pass = '')
    {
        $sms_body = get_sms_template('account_opening_by_admin','sms_body');
        $sms_body = str_replace('[[name]]', $user->first_name.' '.$user->last_name, $sms_body);
        $sms_body = str_replace('[[site_name]]', get_setting('website_name'), $sms_body);
        $sms_body = str_replace('[[password]]', $pass, $sms_body);
        $sms_body = str_replace('[[url]]', env('APP_URL'), $sms_body);
        $sms_content = view('sms.index',['sms_body'=>$sms_body]);
        try {
           sendSMS($user->phone, env('APP_NAME'),strip_tags($sms_body) );
        } catch (\Exception $e) {
            // dd($e);
        }
    }

    public static function account_approval($user = '')
    {
        $sms_body = get_sms_template('account_approval','sms_body');
        $sms_body = str_replace('[[name]]', $user->first_name.' '.$user->last_name, $sms_body);
        $sms_body = str_replace('[[site_name]]', get_setting('website_name'), $sms_body);
        $sms_body = str_replace('[[url]]', env('APP_URL'), $sms_body);
        $sms_content = view('sms.index',['sms_body'=>$sms_body]);
        try {
           sendSMS($user->phone, env('APP_NAME'),strip_tags($sms_body) );
        } catch (\Exception $e) {

        }
    }

    public static function staff_account_opening($user = '', $pass = '', $role_name = '')
    {
        $sms_body = get_sms_template('staff_account_opening','sms_body');
        $sms_body = str_replace('[[name]]', $user->first_name.' '.$user->last_name, $sms_body);
        $sms_body = str_replace('[[site_name]]', get_setting('website_name'), $sms_body);
        $sms_body = str_replace('[[role_type]]', $role_name, $sms_body);
        $sms_body = str_replace('[[password]] ', $pass, $sms_body);
        $sms_body = str_replace('[[url]]', env('APP_URL'), $sms_body);
        $sms_content = view('sms.index',['sms_body'=>$sms_body]);
        try {
            sendSMS($user->phone, env('APP_NAME'),strip_tags($sms_body) );
        } catch (\Exception $e) {

        }
    }

    public static function manual_payment_approval($user = '',  $package_payment = '')
    {
        $sms_body = get_sms_template('manual_payment_approval','sms_body');
        $sms_body = str_replace('[[name]]', $user->first_name.' '.$user->last_name, $sms_body);
        $sms_body = str_replace('[[payment_code]]', $package_payment->payment_code, $sms_body);
        $sms_body = str_replace('[[url]]', env('APP_URL'), $sms_body);
        $sms_content = view('sms.index',['sms_body'=>$sms_body]);
        try {
           sendSMS($user->phone, env('APP_NAME'),strip_tags($sms_body) );
        } catch (\Exception $e) {

        }
    }

    public static function express_interest($user = '')
    {
        $sms_body = get_sms_template('express_interest','sms_body');
        $sms_body = str_replace('[[name]]', $user->first_name.' '.$user->last_name, $sms_body);
        $sms_body = str_replace('[[member_name]]',  Auth::user()->first_name.' '.Auth::user()->last_name, $sms_body);
        $sms_body = str_replace('[[url]]', env('APP_URL'), $sms_body);
        $sms_content = view('sms.index',['sms_body'=>$sms_body]);
        try {
           sendSMS($user->phone, env('APP_NAME'),strip_tags($sms_body) );
        } catch (\Exception $e) {

        }
    }

    public static function accept_interest($user = '', $interest = '')
    {
        $sms_body = get_sms_template('accept_interest','sms_body');
        $sms_body = str_replace('[[name]]', $user->first_name.' '.$user->last_name, $sms_body);
        $sms_body = str_replace('[[member_name]]', $interest->user->first_name.' '.$interest->user->last_name, $sms_body);
        $sms_body = str_replace('[[url]]', env('APP_URL'), $sms_body);
        $sms_content = view('sms.index',['sms_body'=>$sms_body]);
        try {
            sendSMS($user->phone, env('APP_NAME'),strip_tags($sms_body) );
        } catch (\Exception $e) {

        }
    }

    public static function password_reset($user = '', $code = '')
    {
        $sms_body = get_sms_template('password_reset','sms_body');
        $sms_body = str_replace('[[name]]', $user->first_name.' '.$user->last_name, $sms_body);
        $sms_body = str_replace('[[code]]', $code, $sms_body);
        $sms_body = str_replace('[[url]]', env('APP_URL'), $sms_body);
        $sms_content = view('sms.index',['sms_body'=>$sms_body]);
        try {
            sendSMS($user->phone, env('APP_NAME'), $sms_content);
        } catch (\Exception $e) {
            
        }
    }

}

?>
