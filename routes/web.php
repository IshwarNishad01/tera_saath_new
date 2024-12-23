<?php

use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can      web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//demo
Route::get('/demo/cron_1', 'DemoController@cron_1');
Route::get('/demo/cron_2', 'DemoController@cron_2');

Auth::routes();

//Home Page
Route::get('Home', 'HomeController@index')->name('index');
Route::get('Home', 'HomeController@index')->name('home');


Route::get('/', 'RegiController@frontregi')->name('frontgeri');


//api
Route::get('/api', 'ApiController@index');
Route::get('/api/on_behalves', 'ApiController@get_on_behalves');
Route::get('/api/religions', 'ApiController@get_religions');
Route::get('/api/caste', 'ApiController@get_caste');
Route::get('/api/member_language', 'ApiController@get_member_language');
Route::get('/api/country', 'ApiController@get_country');
Route::get('/api/city', 'ApiController@get_city');
Route::get('/api/states', 'ApiController@get_state');
Route::get('/api/country', 'ApiController@get_country');
Route::get('/api/family_values', 'ApiController@get_familyValues');
Route::get('/api/family_status', 'ApiController@get_familyStatus');
Route::get('/api/marital_status', 'ApiController@get_marital_status');
Route::get('/api/all_members', 'ApiController@get_all_members');
Route::get('/api/specific_plan', 'ApiController@get_specific_plan');
Route::get('/api/get_package', 'ApiController@get_package');
Route::get('/api/get_packages_list', 'ApiController@get_packages_list');
Route::post('/api/register_member', 'ApiController@register_member');
Route::get('/api/get_member', 'ApiController@get_member');
Route::get('/api/get_company_info', 'ApiController@get_company_info');
Route::post('/api/login', 'ApiController@login_fetch');
Route::post('/api/update_member_profile', 'ApiController@update_member_profile');
Route::post('/api/quick_search', 'ApiController@quick_search');
Route::post('/api/search_result', 'ApiController@search_result');
Route::get('/api/get_gallery_images', 'ApiController@get_gallery_images');
Route::get('/api/get_education', 'ApiController@get_education');
Route::get('/api/get_addresses', 'ApiController@get_addresses');
Route::get('/api/get_families', 'ApiController@get_families');
Route::get('/api/get_lifestyles', 'ApiController@get_lifestyles');
Route::get('/api/get_physical_attributes', 'ApiController@get_physical_attributes');
Route::get('/api/get_residency', 'ApiController@get_residency');
Route::get('/api/get_spiritual_backgrounds', 'ApiController@get_spiritual_backgrounds');
Route::get('/api/get_shortlist', 'ApiController@get_shortlist');
Route::get('/api/get_partner_expectation', 'ApiController@get_partner_expectation');
Route::get('/api/get_hobbies_interest', 'ApiController@get_hobbies_interest');
Route::get('/api/get_payment_info', 'ApiController@get_payment_info');
Route::get('/api/get_carriers_information', 'ApiController@get_carriers_information');
Route::get('/api/get_astrologies_information', 'ApiController@get_astrologies_information');
Route::get('/api/get_attitudes_information', 'ApiController@get_attitudes_information');
Route::get('/api/get_ignored', 'ApiController@get_ignored');
Route::get('/api/get_express_interests', 'ApiController@get_express_interests');
Route::get('/api/get_package_payments', 'ApiController@get_package_payments');
Route::post('/api/upload_payment_proof', 'ApiController@upload_payment_proof');
Route::post('/api/update_basic_user_profile', 'ApiController@update_basic_user_profile');
Route::post('/api/update_career_user', 'ApiController@update_career_user');
Route::post('/api/add_career_user', 'ApiController@add_career_user');
Route::post('/api/update_physical_attribute', 'ApiController@update_physical_attribute');
Route::post('/api/update_lifestyle', 'ApiController@update_lifestyle');
Route::post('/api/update_hobbies', 'ApiController@update_hobbies');
Route::post('/api/update_attitude', 'ApiController@update_attitude');
Route::post('/api/update_residency', 'ApiController@update_residency');
Route::post('/api/update_spiritual', 'ApiController@update_spiritual');
Route::post('/api/update_family_info', 'ApiController@update_family_info');
Route::post('/api/update_partner_expectation', 'ApiController@update_partner_expectation');
Route::post('/api/update_astrologies', 'ApiController@update_astrologies');
Route::post('/api/delete_education', 'ApiController@delete_education');
Route::post('/api/insert_education', 'ApiController@insert_education');
Route::post('/api/delete_career', 'ApiController@delete_career');
Route::post('/api/insert_career', 'ApiController@insert_career');
Route::post('/api/insert_shortlist_user', 'ApiController@insert_shortlist_user');
Route::post('/api/report_user', 'ApiController@report_user');
Route::post('/api/insert_ignored_user', 'ApiController@insert_ignored_user');
Route::post('/api/insert_express_interests_user', 'ApiController@insert_express_interests_user');
Route::post('/api/upload_member_gallery', 'ApiController@upload_member_gallery');
Route::post('/api/update_address', 'ApiController@update_address');
Route::post('/api/update_user_langauges', 'ApiController@update_user_langauges');
Route::post('/api/delete_shortlist_user', 'ApiController@delete_shortlist_user');
Route::post('/api/delete_ignored_user', 'ApiController@delete_ignored_user');
Route::post('/api/delete_intrested_user', 'ApiController@delete_intrested_user');
Route::post('/api/delete_gallery_image_user', 'ApiController@delete_gallery_image_user');
Route::post('/api/insert_user_contact_view', 'ApiController@insert_user_contact_view');
Route::get('/api/get_contact_information', 'ApiController@get_contact_information');
Route::get('/api/get_member_langauge_info', 'ApiController@get_member_langauge_info');

Route::get('/api/get_happy_stories', 'ApiController@get_happy_stories');
Route::get('/api/get_happy_story_of_member', 'ApiController@get_happy_story_of_member');
Route::post('/api/upload_happy_story', 'ApiController@upload_happy_story');


//Payment Related APIs
Route::post('/api/subscription_purchased_success', 'ApiController@subscription_purchased_success');


// Uploader
Route::get('/refresh-csrf', function(){
    return csrf_token();
});
Route::post('/aiz-uploader', 'AizUploadController@show_uploader');
Route::post('/aiz-uploader/upload', 'AizUploadController@upload');
Route::get('/aiz-uploader/get_uploaded_files', 'AizUploadController@get_uploaded_files');
Route::delete('/aiz-uploader/destroy/{id}', 'AizUploadController@destroy');
Route::post('/aiz-uploader/get_file_by_ids', 'AizUploadController@get_preview_files');
Route::get('/aiz-uploader/download/{id}', 'AizUploadController@attachment_download')->name('download_attachment');

Auth::routes(['verify' => true]);
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
Route::get('/email/resend', 'Auth\VerificationController@resend')->name('verification.resend');
Route::get('/verification-confirmation/{code}', 'Auth\VerificationController@verification_confirmation')->name('email.verification.confirmation');
Route::get('/email_change/callback', 'HomeController@email_change_callback')->name('email_change.callback');
Route::post('/password/reset/email/submit', 'HomeController@reset_password_with_code')->name('password.update');


Route::get('/users/login', 'HomeController@login')->name('user.login');
Route::get('/social-login/redirect/{provider}', 'Auth\LoginController@redirectToProvider')->name('social.login');
Route::get('/social-login/{provider}/callback', 'Auth\LoginController@handleProviderCallback')->name('social.callback');

Route::get('/users/blocked', 'HomeController@user_account_blocked')->name('user.blocked');

//matrimoial form
Route::get('/brahmin-parichay-sammelan', 'HomeController@matrimonial_form')->name('matrimonial-form');
Route::post('/form-matrimonial', 'HomeController@form_matrimonials')->name('form-matrimonial');

Route::get('/payment', 'HomeController@payment')->name('payment');

Route::post('/language', 'LanguageController@changeLanguage')->name('language.change');
Route::post('/currency', 'CurrencyController@changeCurrency')->name('currency.change');


Route::get('/packages', 'PackageController@select_package')->name('packages');
Route::get('/happy-stories','HomeController@happy_stories')->name('happy_stories');
Route::get('/story_details/{id}','HomeController@story_details')->name('story_details');

Route::group(['middleware' => ['member','verified']], function(){

    Route::any('/member-listing', 'HomeController@member_listing')->name('member.listing');

    Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard');
    Route::post('/new-user-email', 'HomeController@update_email')->name('user.change.email');
    Route::post('/new-user-verification', 'HomeController@new_verify')->name('user.new.verify');


    Route::get('/profile-settings', 'MemberController@profile_settings')->name('profile_settings');
    Route::get('/package-payment-methods/{id}', 'PackageController@package_payemnt_methods')->name('package_payment_methods');
    Route::post('/package-payment','PackagePaymentController@store')->name('package.payment');

    Route::get('/package-purchase-history', 'PackagePaymentController@package_purchase_history')->name('package_purchase_history');

    Route::get('/member-profile/{id}', 'HomeController@view_member_profile')->name('member_profile');

    // Password Change
    Route::get('/members/change-password', 'MemberController@change_password')->name('member.change_password');
    Route::post('/member/password-update/{id}', 'MemberController@password_update')->name('member.password_update');

    // Member Picture privacy
    Route::get('/members/picture-privacy', 'MemberController@picture_privacy')->name('member.picture_privacy');
    Route::post('/member/update-picture-privacy/{id}', 'MemberController@update_picture_privacy')->name('member.update_picture_privacy');

    // Gallery Image
    Route::resource('/gallery-image', 'GalleryImageController');
    Route::get('/gallery_image/destroy/{id}','GalleryImageController@destroy')->name('gallery_image.destroy');

    // Account deacticvation
    Route::post('/member/account-activation', 'MemberController@update_account_deactivation_status')->name('member.account_deactivation');


    // Express Interest
    Route::resource('/express-interest', 'ExpressInterestController');
    Route::get('/my-interests', 'ExpressInterestController@index')->name('my_interests.index');
    Route::get('/interest/requests', 'ExpressInterestController@interest_requests')->name('interest_requests');
    Route::post('/interest/accept', 'ExpressInterestController@accept_interest')->name('accept_interest');
    Route::post('/interest/reject', 'ExpressInterestController@reject_interest')->name('reject_interest');


    Route::get('/chat', 'ChatController@index')->name('all.messages');
    Route::get('/single-chat/{id}', 'ChatController@chat_view')->name('chat_view');
    Route::post('/chat-reply', 'ChatController@chat_reply')->name('chat.reply');
    Route::get('/chat/refresh/{id}', 'ChatController@chat_refresh')->name('chat_refresh');
    Route::post('/chat/old-messages', 'ChatController@get_old_messages')->name('get-old-message');


    // ShortList list, Add, Remove
    Route::get('/my-shortlists', 'ShortlistController@index')->name('my_shortlists');
    Route::post('/member/add-to-shortlist', 'ShortlistController@create')->name('member.add_to_shortlist');
    Route::post('/member/remove-from-shortlist', 'ShortlistController@remove')->name('member.remove_from_shortlist');

    // Ignore list, Add, Remove
    Route::get('/ignored-list', 'IgnoredUserController@index')->name('my_ignored_list');
    Route::post('/member/add-to-ignore-list', 'IgnoredUserController@add_to_ignore_list')->name('member.add_to_ignore_list');
    Route::post('/member/remove-from-ignored-list', 'IgnoredUserController@remove_from_ignored_list')->name('member.remove_from_ignored_list');

    Route::resource('reportusers', 'ReportedUserController');
    Route::resource('view_contacts', 'ViewContactController');


    Route::get('/member/notifications','NotificationController@frontend_notify_listing')->name('frontend.notifications');

});

Route::group(['middleware' => ['auth']], function () {
    // member info edit
    Route::post('/members/introduction_update/{id}', 'MemberController@introduction_update')->name('member.introduction.update');
    Route::post('/members/basic_info_update/{id}', 'MemberController@basic_info_update')->name('member.basic_info_update');
    Route::post('/members/language_info_update/{id}', 'MemberController@language_info_update')->name('member.language_info_update');

    Route::resource('/address','AddressController');

    // Member education
    Route::resource('/education','EducationController');
    Route::post('/education/create', 'EducationController@create')->name('education.create');
    Route::post('/education/edit', 'EducationController@edit')->name('education.edit');
    Route::post('/education/update_education_present_status','EducationController@update_education_present_status')->name('education.update_education_present_status');
    Route::get('/education/destroy/{id}','EducationController@destroy')->name('education.destroy');

    // Member Career
    Route::resource('/career','CareerController');
    Route::post('/career/create', 'CareerController@create')->name('career.create');
    Route::post('/career/edit', 'CareerController@edit')->name('career.edit');
    Route::post('/career/update_career_present_status','CareerController@update_career_present_status')->name('career.update_career_present_status');
    Route::get('/career/destroy/{id}','CareerController@destroy')->name('career.destroy');

    Route::resource('/physical-attribute','PhysicalAttributeController');
    Route::resource('/hobbies','HobbyController');
    Route::resource('/attitudes','AttitudeController');
    Route::resource('/recidencies','RecidencyController');
    Route::resource('/lifestyles','LifestyleController');
    Route::resource('/astrologies','AstrologyController');
    Route::resource('/families','FamilyController');
    Route::resource('/spiritual_backgrounds','SpiritualBackgroundController');
    Route::resource('/partner_expectations','PartnerExpectationController');

    Route::post('/states/get_state_by_country', 'StateController@get_state_by_country')->name('states.get_state_by_country');
    Route::post('/cities/get_cities_by_state', 'CityController@get_cities_by_state')->name('cities.get_cities_by_state');
    Route::post('/castes/get_caste_by_religion', 'CasteController@get_caste_by_religion')->name('castes.get_caste_by_religion');
    Route::post('/sub-castes/get_sub_castes_by_religion', 'SubCasteController@get_sub_castes_by_religion')->name('sub_castes.get_sub_castes_by_religion');

    Route::get('/package-payment-invoice/{id}', 'PackagePaymentController@package_payment_invoice')->name('package_payment.invoice');

    Route::resource('/happy-story','HappyStoryController');

    Route::get('/notification-view/{id}','NotificationController@notification_view')->name('notification_view');
});

// Payment gateway Redirect

//Paypal START
Route::get('/paypal/payment/done', 'PaypalController@getDone')->name('payment.done');
Route::get('/paypal/payment/cancel', 'PaypalController@getCancel')->name('payment.cancel');
//Paypal END

Route::get('/instamojo/payment/pay-success', 'InstamojoController@success')->name('instamojo.success');
Route::post('rozer/payment/pay-success', 'RazorpayController@payment')->name('payment.rozer');

//Stipe Start
Route::get('stripe', 'StripeController@stripe');
Route::post('/stripe/create-checkout-session', 'StripeController@create_checkout_session')->name('stripe.get_token');
Route::any('/stripe/payment/callback', 'StripeController@callback')->name('stripe.callback');
Route::get('/stripe/success', 'StripeController@success')->name('stripe.success');
Route::get('/stripe/cancel', 'StripeController@cancel')->name('stripe.cancel');
//Stripe END

Route::get('/check_for_package_invalid', 'PackageController@check_for_package_invalid')->name('member.check_for_package_invalid');

Route::get('/check', 'HomeController@check')->name('check');
Route::get('/match_profiles', 'ProfileMatchController@match_profiles')->name('match_profiles');

//Custom page
Route::get('/{slug}', 'PageController@show_custom_page')->name('custom-pages.show_custom_page');
