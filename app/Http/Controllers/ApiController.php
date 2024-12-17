<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Models\Member;
use App\Models\Career;
use App\Models\PackagePayment;
use DB;
use Storage;
use DateTime;
use App\Upload;
use Response;
use Auth;
use Image;

class ApiController extends Controller
{
    
    public function index()
    {
        return DB::table('on_behalves')->get();
    }

     public function get_on_behalves()
    {
        return DB::table('on_behalves')->where('deleted_at',NULL)->get();
    }
     public function get_religions()
    {
        return DB::table('religions')->where('deleted_at',NULL)->get();
    }
     public function get_caste()
    {
        return DB::table('castes')->where('deleted_at',NULL)->get();
    } 
    public function get_member_language()
    {
        return DB::table('member_languages')->where('deleted_at',NULL)->get();
    }
      public function get_country()
    {
        return DB::table('countries')->where('deleted_at',NULL)->get();
    }

   public function get_city()
    {
        $id = $_REQUEST['stateid'];
        return DB:: table('cities')->where('state_id',$id)->get();
        // return DB::table('cities')->get();
    }
   public function get_state()
    {
        $id = $_REQUEST['countryid'];
        return DB:: table('states')->where('country_id','101')->get();
        // return DB::table('cities')->get();
    }

 public function get_familyValues()
    {
        return DB::table('family_values')->get();
    }
    public function get_familyStatus()
    {
        return DB::table('family_statuses')->get();
    }
  public function get_marital_status()
    {
        return DB::table('marital_statuses')->get();
    }

    public function get_all_members(Request $request)
    {
       // return DB:: table('on_behaRequest $requestlves')->select('name')->get();

        if($request->userid)
        {
            $user = DB::table('members')->where('user_id',$request->userid)->first();
            if($user)
            {
                $gender = ($user->gender==1)?2:1;
            }
        }


        $db = DB::table('members');
        $db->select('members.*','users.*','uploads.file_name AS Image_path','on_behalves.name AS on_behalves_name' ,'packages.name AS packages_name'
        ,'marital_statuses.name as marial_status_name','addresses.city_id','addresses.state_id','cities.name as city_name','states.name as state_name');
        $db->join('users','users.id','=','members.user_id');
        
        $db->leftjoin('uploads','users.photo','=','uploads.id');
        $db->leftJoin('marital_statuses','marital_statuses.id','=','members.marital_status_id');
        $db->leftJoin('addresses',function($join) {
                $join->on('addresses.user_id','=','members.user_id')->where('addresses.type', 'present');
            });
        $db->leftJoin('cities','cities.id','=','addresses.city_id');
        $db->leftJoin('states','states.id','=','addresses.state_id');
        $db->leftJoin('on_behalves','on_behalves.id','=','members.on_behalves_id');
        $db->leftJoin('packages','packages.id','=','members.current_package_id');
        //  $db->take(10);
        //  $db->orderBy('members.id','DESC');
        if(isset($gender))
        {
            $db->where('members.gender','=',$gender);
        }
        $db->where('users.deleted_at','=',NULL);
        $db->orderBy('users.id','DESC');
        return $db->get();

        // return DB::table('members')
        // ->select('members.*','users.*','uploads.file_name AS Image_path','on_behalves.name AS on_behalves_name' ,'packages.name AS packages_name'
        // ,'marital_statuses.name as marial_status_name','addresses.city_id','addresses.state_id','cities.name as city_name','states.name as state_name')
        // ->join('users','users.id','=','members.user_id')
        
        //  ->leftjoin('uploads','users.photo','=','uploads.id')
        //   ->leftJoin('marital_statuses','marital_statuses.id','=','members.marital_status_id')
        //   ->leftJoin('addresses',
        //         function($join)
        //         {
        //             $join->on('addresses.user_id','=','members.user_id')->where('addresses.type', 'present');
        //         } )
        //      ->leftJoin('cities','cities.id','=','addresses.city_id')
        //       ->leftJoin('states','states.id','=','addresses.state_id')
        //        ->leftJoin('on_behalves','on_behalves.id','=','members.on_behalves_id')
        //         ->leftJoin('packages','packages.id','=','members.current_package_id')
        //         //  ->take(10)
        //         //  ->orderBy('members.id','DESC')
        //         ->where('users.deleted_at','=',NULL)
        //         ->orderBy('users.id','DESC')
        //          ->get();
    }

    public function get_specific_plan()
    {
       // return DB:: table('on_behalves')->select('name')->get();
        return DB::table('members')
        ->select('members.*','on_behalves.name AS on_behalves_name' ,'packages.name AS packages_name')
        ->join('on_behalves','on_behalves.id','=','members.on_behalves_id')
        ->join('packages','packages.id','=','members.current_package_id')
        // ->where('current_package_id', '=', "2")
        ->orderBy('current_package_id','DESC')
        ->take(40)
        ->get();
    }

    public function get_package()
    {
        $id = $_REQUEST['id'];
        // return DB:: table('packages')->where('id',$id)->get();
        return DB::table('packages')
        ->where('packages.deleted_at',NULL)
        ->where('packages.id',$id)
        ->select('packages.*','uploads.file_name AS Image_file_name')
        ->leftJoin('uploads','uploads.id','=','packages.image')
        ->get();
    }
    
    
    
    public function get_packages_list()
    {
    
        return DB::table('packages')
        ->where('packages.deleted_at',NULL)
        ->select('packages.*','uploads.file_name AS Image_file_name')
        ->leftJoin('uploads','uploads.id','=','packages.image')
        ->get();
    }
    public function get_happy_stories()
    {
    
        return DB::table('happy_stories')
        ->where('happy_stories.approved',1)
        ->select('happy_stories.*','uploads.*','users.first_name','users.last_name')
        ->leftJoin('users','users.id','=','happy_stories.user_id')
        ->leftJoin('uploads','uploads.id','=','happy_stories.photos')
        ->get();
    }
    public function get_happy_story_of_member()
    {
        $id = $_GET['userid'];
    
        return DB::table('happy_stories')
        ->where('happy_stories.approved',1)
        ->select('happy_stories.*','uploads.*','users.first_name','users.last_name')
        ->leftJoin('users','users.id','=','happy_stories.user_id')
        ->leftJoin('uploads','uploads.id','=','happy_stories.photos')
        ->where('users.id',$id)
        ->first();
    }
    
    public function login_fetch(Request $request)
    {
    if($request->username != ''){
    if(str_contains($request->username , '@')){
          $user = User::where('email', '=', $request->username)->first();
    if($user != ''){
       if( Hash::check($request->password, $user->password)){
           //$2y$10$FYu3Bk5lTvKQkkqPgLfZeu1DQQ/yvT1aQjCZeVbiv0YemEph4Cise
           
                    $res['response'] = 'success';
                    $res['id'] = $user->id;
                     
       }else{
              $res['response'] = "error";
             $res['message'] = "Password incorrect";
       }
    }else{
             $res['response'] = "error";
             $res['message'] = "User not exist.";
    }
    }else{
            $user = User::where('phone', '=', $request->username)->first();
    if($user != ''){
       if( Hash::check($request->password, $user->password)){
           //$2y$10$FYu3Bk5lTvKQkkqPgLfZeu1DQQ/yvT1aQjCZeVbiv0YemEph4Cise
           
                    $res['response'] = 'success';
                    $res['id'] = $user->id;
                     
       }else{
              $res['response'] = "error";
             $res['message'] = "Password incorrect";
       }
    }else{
             $res['response'] = "error";
             $res['message'] = "User not exist.";
    } 
    }
    }else{
        $res['response'] = "error";
             $res['message'] = "User id and password Required";
    }
        echo json_encode($res);
  
    }
    
   
    
    public function get_member(Request $request)
    {
        
        $id = $request->userid;
        
        // return User::whereId($id)->first();
        
        return DB::table('users')
        ->select('users.*','members.*','marital_statuses.*','on_behalves.name AS on_behalves_name' ,'packages.name AS packages_name',
        'member_languages.name As member_mother_tounge', 'uploads.file_name As Image_path','view_contacts.viewed_by As contact_viewed_by')
        ->leftJoin('members','members.user_id','=','users.id')
        ->leftJoin('marital_statuses','marital_statuses.id','=','members.marital_status_id')
        ->leftJoin('on_behalves','on_behalves.id','=','members.on_behalves_id')
        ->leftJoin('packages','packages.id','=','members.current_package_id')
        ->leftJoin('member_languages','member_languages.id','=','members.mothere_tongue')
        ->leftJoin('view_contacts','view_contacts.user_id','=','members.user_id')
        ->leftJoin('uploads','uploads.id','=','users.photo')
        ->where('users.id', $id)
        ->get();
      
    }
    
    public function get_company_info()
    {
        return DB:: table('settings')
        ->where('type','header_helpline_no')
        ->orWhere('type','footer_email')
        ->orWhere('type','footer_website')
        ->orWhere('type','facebook_link')
        ->orWhere('type','twitter_link')
        ->orWhere('type','instagram_link')
        ->orWhere('type','linkedin_link')
        ->orWhere('type','youtube_link')
        ->get();
    }
    
    public function update_member_profile(Request $request){
     
      $upload = new Upload;
    $extension = strtolower($request->file('image')->getClientOriginalExtension());
     $size = $request->file('image')->getSize();
    if($request->file('image')){
            $file= $request->file('image');
            //  $size = $img->filesize();
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('public/uploads/Image/'), $filename);
          

                $upload->extension = $extension;
                $upload->file_original_name = $file->getClientOriginalName();
                $upload->file_name = 'public/uploads/Image/'.$filename;
                $upload->user_id = $request->userid;
                $upload->type = 'image';
                $upload->file_size = $size;
                $upload->save();
                
                
        $user = User::where('id',$request->userid)->first();
        $user->photo             = $upload->id;
        if($user->save())
        {
              $res['response'] = "success";
             $res['message'] = "profile picture update successfully";
    
        echo json_encode($res);
  
        }else{
           
             $res['response'] = "error";
             $res['message'] = "profile picture update failed";
    
        echo json_encode($res);
        }
        
            
        }
        
    }
 
 
 public function quick_search(Request $request)
 {
    if($request->user_id)
    {
        $user = DB::table('members')->where('user_id',$request->user_id)->first();
        if($user)
        {
            $gender = ($user->gender==1)?2:1;
        }
    }

    $db =  DB::table('members');
    
    $db->select('members.*','users.*','uploads.file_name AS Image_path','on_behalves.name AS on_behalves_name' ,'packages.name AS packages_name'
        ,'marital_statuses.name as marial_status_name','addresses.city_id','addresses.state_id','cities.name as city_name','states.name as state_name');
    $db->leftJoin('users','users.id','=','members.user_id');
    $db->leftJoin('uploads','users.id','=','uploads.user_id');
    $db->leftJoin('marital_statuses','marital_statuses.id','=','members.marital_status_id');
    $db->leftJoin('addresses','addresses.user_id','=','members.user_id');
    $db->leftJoin('cities','cities.id','=','addresses.city_id');
    $db->leftJoin('states','states.id','=','addresses.state_id');
    $db->leftJoin('on_behalves','on_behalves.id','=','members.on_behalves_id');
    $db->leftJoin('packages','packages.id','=','members.current_package_id');
    //   $db->whereYear('members.birthday', [$request->starting_year, $request->ending_year]);
    $db->whereBetween('members.birthday', [date($request->starting_year), date($request->ending_year)]);

    if(isset($gender))
    {
        $db->where('members.gender','=',$gender);
    }
    
    return $db->get();
 }
 
 public function search_result(Request $request)
    {
        if($request->user_id)
        {
            $user = DB::table('members')->where('user_id',$request->user_id)->first();
            if($user)
            {
                $gender = ($user->gender==1)?2:1;
            }
        }
         
        $db = DB::table('members'); 
        
        $db->leftjoin('users','users.id','=','members.user_id');
        
        
        $db->leftjoin('uploads','users.photo','=','uploads.id');
        $db->leftJoin('marital_statuses','marital_statuses.id','=','members.marital_status_id');
        $db->leftJoin('addresses',
            function($join)
            {
                $join->on('addresses.user_id','=','members.user_id')->where('addresses.type', 'present');
            } 
        );
        // $db->where('addresses.type','=','present');
        $db->leftJoin('cities','cities.id','=','addresses.city_id');
        $db->leftJoin('states','states.id','=','addresses.state_id');
        $db->leftJoin('on_behalves','on_behalves.id','=','members.on_behalves_id');
        $db->leftJoin('packages','packages.id','=','members.current_package_id');
        $db->leftJoin('spiritual_backgrounds','users.id','=','spiritual_backgrounds.user_id');
        $db->leftJoin('physical_attributes','physical_attributes.user_id','=','users.id');
        
        $db->where('users.deleted_at','=',NULL);
        $db->orderBy('users.id','DESC');
        
        $db->select('members.*','users.*','uploads.file_name AS Image_path','on_behalves.name AS on_behalves_name' ,'packages.name AS packages_name'
        ,'marital_statuses.name as marial_status_name','addresses.city_id','addresses.state_id','cities.name as city_name','states.name as state_name');
            
        if($request->marital_status)
        {
            $db->where('members.marital_status_id',$request->marital_status);
        }
        
         if($request->mothertongue){
            $db->where('members.mothere_tongue',$request->mothertongue);
         } 
        if(isset($gender))
        {
            $db->where('members.gender','=',$gender);
        }
        if($request->gender)
        {
            $gender = ($request->gender==1)?1:2;
            $db->where('members.gender',$gender);
        }
        if($request->height){
            $db->where('physical_attributes.height',$request->height);
         }
        
        if($request->state){
            $db->where('addresses.state_id',$request->state);
         }
         
        if($request->member_id){
             $db->where('users.code', '=', ($request->member_id));
        } 
        
        if($request->religin_id){
            $db->where('spiritual_backgrounds.religion_id', '=', ($request->religin_id));
        }
        if($request->caste_id){
            $db->where('spiritual_backgrounds.caste_id', '=', ($request->caste_id));
        }
        if($request->city){
            $db->where('addresses.city_id', '=', ($request->city));
        }
        if($request->agefrom && $request->ageto)
        {
            $dateTime1 =new DateTime(date('Y-01-01'));
            $dateTime2 =new DateTime(date('Y-01-01'));
            $startDate = $dateTime1->modify('-'.($request->agefrom) .' year')->format('Y-m-d 00:00:00');
            $endDate = $dateTime2->modify('-'.($request->ageto-1) .' year')->format('Y-m-d 00:00:00');
            
            $db->where('members.birthday', '>=', $startDate);
            $db->where('members.birthday', '<=', $endDate);
        }
        
        return $db->get();
    }
 
 public function get_gallery_images(Request $request){
      $id = $request->userid;
       
        return DB::table('gallery_images')
         ->select('gallery_images.*','uploads.file_name AS image_path')
         ->join('uploads','uploads.id','=','gallery_images.image')
         ->where('gallery_images.user_id', $id)
         ->get();
 }
 
 
 public function get_education(Request $request){
      $id = $request->userid;
       
        return DB::table('education')
         ->select('education.*')
         ->where('education.user_id', $id)
         ->get();
 } 
 public function get_addresses(Request $request){
      $id = $request->userid;
       
        return DB::table('users')
         ->select('addresses.*','cities.name AS City_name','states.name AS state_name','countries.name AS country_name','addresses.postal_code')
         ->leftJoin('addresses','addresses.user_id','=','users.id')
         ->leftJoin('cities','cities.id','=','addresses.city_id')
         ->leftJoin('states','states.id','=','addresses.state_id')
         ->leftJoin('countries','countries.id','=','addresses.country_id')
         ->where('users.id', $id)
         ->get();
 }
  public function get_families(Request $request){
      $id = $request->userid;
       
        return DB::table('users')
         ->select('families.*')
          ->leftJoin('families','families.user_id','=','users.id')
         ->where('users.id', $id)
         ->get();
 } 
 public function get_lifestyles(Request $request){
      $id = $request->userid;
       
        return DB::table('users')
                 ->select('lifestyles.*')
        ->leftJoin('lifestyles','lifestyles.user_id','=','users.id')
         ->where('users.id', $id)
         ->get();
 } 
 public function get_physical_attributes(Request $request){
      $id = $request->userid;
       
        return DB::table('users')
         ->select('physical_attributes.*')
          ->leftJoin('physical_attributes','physical_attributes.user_id','=','users.id')
         ->where('users.id', $id)
         ->get();
 }
 
 public function get_residency(Request $request){
      $id = $request->userid; 
      
     return DB::table('users')
     ->select('recidencies.*','countries.name AS birth_country_name','countries.name AS recidency_country_name','countries.name AS growup_country_name')
      ->leftJoin('recidencies','recidencies.user_id','=','users.id')
     ->leftJoin('countries','countries.id','=','recidencies.recidency_country_id')
     ->where('users.id',$id)
     ->get();
 }
 public function get_shortlist(Request $request){
      $id = $request->userid; 
      
     return DB::table('users')
     ->select('shortlists.id AS shortlist_id','shortlists.shortlisted_by AS shortlisted_user_id','users.id AS user_id')
     ->join('shortlists','shortlists.user_id','=','users.id')
     ->where('users.id',$id)
    //  ->groupBy('shortlisted_by')
     ->get();
 }
 
 public function get_spiritual_backgrounds(Request $request){
      $id = $request->userid; 
      
     return DB::table('users')
     ->select('spiritual_backgrounds.*','religions.name AS religion_name','castes.name AS caste_name','spiritual_backgrounds.sub_caste_name AS sub_caste_name','family_values.name AS family_values_name')
       ->leftJoin('spiritual_backgrounds','spiritual_backgrounds.user_id','=','users.id')
     ->leftJoin('religions','religions.id','=','spiritual_backgrounds.religion_id')
     ->leftJoin('castes','castes.id','=','spiritual_backgrounds.caste_id')
     ->leftJoin('sub_castes','sub_castes.id','=','spiritual_backgrounds.sub_caste_id')
     ->leftJoin('family_values','family_values.id','=','spiritual_backgrounds.family_value_id')
     ->where('users.id',$id)
     ->get();
 }
   
//  public function get_partner_expectation(Request $request){
   
//          $id = $request->userid; 
//      return DB::table('users')
//      ->select('partner_expectations.*','marital_statuses.name AS marital_statuses_name')
//      ->leftJoin('marital_statuses','marital_statuses.id','=','partner_expectations.marital_status_id')degree
//      ->where('users.id',$id)
//      ->get();
//  }   
 
 public function get_partner_expectation(Request $request){
      $id = $request->userid; 
      
     return DB::table('users')
     ->select('partner_expectations.*','marital_statuses.name AS marital_status_name','countries.name AS residencies_country_name','religions.name AS religion_name','castes.name AS caste_name','sub_castes.name AS sub_castes_name','education.degree AS educational_degree','permissions.name AS permission_name','languages.name AS Language','family_values.name AS Family_Values','states.name AS Preffered_states')
     ->leftJoin('partner_expectations','partner_expectations.user_id','=','users.id')
     ->leftJoin('marital_statuses','marital_statuses.id','=','partner_expectations.marital_status_id')
     ->leftJoin('countries','countries.id','=','partner_expectations.residence_country_id')
     ->leftJoin('religions','religions.id','=','partner_expectations.religion_id')
     ->leftJoin('castes','castes.id','=','partner_expectations.caste_id')
     ->leftJoin('sub_castes','sub_castes.id','=','partner_expectations.sub_caste_id')
     ->leftJoin('education','education.id','=','partner_expectations.education')
     ->leftJoin('permissions','permissions.id','=','partner_expectations.profession')
     ->leftJoin('languages','languages.id','=','partner_expectations.language_id')
     ->leftJoin('family_values','family_values.id','=','partner_expectations.family_value_id')
     ->leftJoin('states','states.id','=','partner_expectations.preferred_state_id')
     ->where('users.id',$id)
     ->get();
 }
 
 public function get_hobbies_interest(Request $request){
      $id = $request->userid; 
      
     return DB::table('users')
     ->select('hobbies.hobbies AS hobbie_name','hobbies.interests AS Interest_name')
      ->leftJoin('hobbies','hobbies.user_id','=','users.id')
     ->where('users.id',$id)
     ->get();
 }
 
  public function get_payment_info()
    {
        return DB:: table('settings')
         ->select('uploads.file_name AS image_path')
         ->join('uploads','uploads.id','=','settings.value')
        ->where('settings.type','manual_payment_1_image')
        ->get();
    }
    
    
     public function get_carriers_information(Request $request){
      $id = $request->userid;
       
         return DB::table('users')
         ->select('careers.*')
         ->leftJoin('careers','careers.user_id','=','users.id')
         ->where('users.id', $id)
         ->get();
 } 
 
   public function get_astrologies_information(Request $request){
      $id = $request->userid;
       
        return DB::table('users')
         ->select('astrologies.*')
         ->leftJoin('astrologies','astrologies.user_id','=','users.id')
         ->where('users.id', $id)
         ->get();
 }  
 public function get_attitudes_information(Request $request){
      $id = $request->userid;
       
        return DB::table('users')
         ->select('attitudes.*')
         ->leftJoin('attitudes','attitudes.user_id','=','users.id')
         ->where('users.id', $id)
         ->get();
 } 
 
 
  public function get_ignored(Request $request){
      $id = $request->userid; 
      
     return DB::table('users')
     ->select('ignored_users.id AS ignored_id','ignored_users.ignored_by     AS ignored_by_user_id','users.id AS user_id')
     ->join('ignored_users','ignored_users.user_id','=','users.id')
     ->where('users.id',$id)
    //  ->groupBy('shortlisted_by')
     ->get();
 }  
 public function get_express_interests(Request $request){
      $id = $request->userid; 
      
     return DB::table('users')
     ->select('express_interests.id AS interested_by_id','express_interests.interested_by AS interested_by_user_id','users.id AS user_id')
     ->join('express_interests','express_interests.user_id','=','users.id')
     ->where('users.id',$id)
    //  ->groupBy('express_interests.interested_by')
     ->get();
 }
 
 public function get_package_payments(Request $request){
      $id = $request->userid; 
      
     return DB::table('users')
     ->select('package_payments.*')
     ->join('package_payments','package_payments.user_id','=','users.id')
     ->where('users.id',$id)
    //  ->groupBy('shortlisted_by')
     ->get();
 }
 
 
 public function update_basic_user_profile(Request $request){
     
      $user = User::where('id',$request->userid)->first();
        $user->first_name             = $request->first_name;
        $user->last_name             = $request->last_name;
        // $user->email             = $request->email;
        $user->phone             = $request->phone;
       $user->save();
       
        $member                     = Member::where('user_id',$request->userid)->first();
        $member->gender             = $request->gender;
        $member->on_behalves_id     = $request->on_behalf;
        $member->birthday           = date('Y-m-d', strtotime($request->birthday));
        $member->marital_status_id  = $request->marital_status;
        $member->children           = $request->children;
        $member->living_together           = $request->living_together;
        $member->profile_picture_privacy         = 1;
        $member->gallery_image_privacy         = 1;

        

        if($member->save())
        {
              $res['response'] = "success";
             $res['message'] = "Member basic info  has been updated successfully";
    
        echo json_encode($res);
  
        }else{
           
             $res['response'] = "error";
             $res['message'] = "profile picture update failed";
    
        echo json_encode($res);
        }
     
 }
 
 
 public function update_career_user(Request $request){
        $career = Career::where('user_id',$request->userid)->first();
        $career->designation             = $request->designation;
        $career->company             = $request->company;

        if($career->save())
        {
              $res['response'] = "success";
             $res['message'] = "Member carrier info  has been updated successfully";
    
        echo json_encode($res);
  
        }else{
           
             $res['response'] = "error";
             $res['message'] = "carrier update failed";
    
        echo json_encode($res);
        }
 }
 
 public function add_career_user(Request $request){
               $career = new Career;
        $career->designation             = $request->designation;
        $career->user_id             = $request->userid;
        $career->company             = $request->company;
        $career->start             = $request->start;
        $career->end             = $request->end;
        $career->present             = $request->present;
        $career->packageis             = $request->packageis;

        if($career->save())
        {
              $res['response'] = "success";
             $res['message'] = "Member carrier info  has been upload successfully";
    
        echo json_encode($res);
  
        }else{
           
             $res['response'] = "error";
             $res['message'] = "carrier update failed";
    
        echo json_encode($res);
        }

 }

public function update_physical_attribute(Request $request){
    
    $data =
    [
        'height'=>$request ->height,
         'weight'=>$request ->weight,
          'complexion'=>$request ->complexion,
           'body_type'=>$request ->body_type,
    ];
    $tableName = "physical_attributes";
        $tableWhere = "user_id";
        $tableWhereValue = $request->user_id;
        if(DB::table($tableName)->where($tableWhere, $tableWhereValue)->count())
        {
            if(DB::table($tableName)->where($tableWhere, $tableWhereValue)->where($data)->first())
            {
                $res['response'] = "success";
                $res['message'] = "Data updated with no changes";
            }else{
                if(DB::table($tableName)->where($tableWhere, $tableWhereValue)->update($data))
                {
                        $res['response'] = "success";
                        $res['message'] = "Member info  has been updated successfully";
                }else{
                        $res['response'] = "error";
                        $res['message'] = "Updation failed";
                }
            }
            
        }else{
            $data[$tableWhere] = $tableWhereValue;
            if(DB::table($tableName)->insert($data))
            {
                $res['response'] = "success";
                $res['message'] = "Member info  has been updated successfully";
            }else{
                $res['response'] = "error";
                $res['message'] = "Member info updation failed";
            }
        }
        echo json_encode($res); 
    //     if(
    // DB::table('physical_attributes')
    // ->where('user_id', $request->user_id)
    // ->update($data))
    //   {
    //           $res['response'] = "success";
    //          $res['message'] = "Member info  has been updated successfully";
    
    //     echo json_encode($res);
    //   }
    //     else{
           
    //          $res['response'] = "error";
    //          $res['message'] = " updation failed";
    
    //     echo json_encode($res);
    //     }
 }
 
 public function update_lifestyle(Request $request){
    
    $data =
    [
        'diet'=>$request ->diet,
         'drink'=>$request ->drink,
          'smoke'=>$request ->smoke,
           'living_with'=>$request ->living_with,
    ];
    
    $tableName = "lifestyles";
        $tableWhere = "user_id";
        $tableWhereValue = $request->user_id;
        if(DB::table($tableName)->where($tableWhere, $tableWhereValue)->count())
        {
            if(DB::table($tableName)->where($tableWhere, $tableWhereValue)->where($data)->first())
            {
                $res['response'] = "success";
                $res['message'] = "Data updated with no changes";
            }else{
                if(DB::table($tableName)->where($tableWhere, $tableWhereValue)->update($data))
                {
                        $res['response'] = "success";
                        $res['message'] = "Member info  has been updated successfully";
                }else{
                        $res['response'] = "error";
                        $res['message'] = "Updation failed";
                }
            }
            
        }else{
            $data[$tableWhere] = $tableWhereValue;
            if(DB::table($tableName)->insert($data))
            {
                $res['response'] = "success";
                $res['message'] = "Member info  has been updated successfully";
            }else{
                $res['response'] = "error";
                $res['message'] = "Member info updation failed";
            }
        }
        echo json_encode($res); 
    //     if(
    // DB::table('lifestyles')
    // ->where('user_id', $request->user_id)
    // ->update($data))
    //   {
    //           $res['response'] = "success";
    //          $res['message'] = "Member info  has been updated successfully";
    
    //     echo json_encode($res);
    //   }
    //     else{
           
    //          $res['response'] = "error";
    //          $res['message'] = " updation failed";
    
    //     echo json_encode($res);
    //     }
 }
 
  public function update_hobbies(Request $request){
    
    $data =
    [
        'hobbies'=>$request ->hobbies,
         'interests'=>$request ->interests,
          'music'=>$request ->music,
           'books'=>$request ->books,
            'movies'=>$request ->movies,
             'tv_shows'=>$request ->tv_shows,
              'sports'=>$request ->sports,
               'fitness_activities'=>$request ->fitness_activities,
                'cuisines'=>$request ->cuisines,
                 'dress_styles'=>$request ->dress_styles,
                  
    ];
    
    $tableName = "hobbies";
        $tableWhere = "user_id";
        $tableWhereValue = $request->user_id;
        if(DB::table($tableName)->where($tableWhere, $tableWhereValue)->count())
        {
            if(DB::table($tableName)->where($tableWhere, $tableWhereValue)->where($data)->first())
            {
                $res['response'] = "success";
                $res['message'] = "Data updated with no changes";
            }else{
                if(DB::table($tableName)->where($tableWhere, $tableWhereValue)->update($data))
                {
                        $res['response'] = "success";
                        $res['message'] = "Member info  has been updated successfully";
                }else{
                        $res['response'] = "error";
                        $res['message'] = "Updation failed";
                }
            }
            
        }else{
            $data[$tableWhere] = $tableWhereValue;
            if(DB::table($tableName)->insert($data))
            {
                $res['response'] = "success";
                $res['message'] = "Member info  has been updated successfully";
            }else{
                $res['response'] = "error";
                $res['message'] = "Member info updation failed";
            }
        }
        echo json_encode($res); 
        
    //     if(
    // DB::table('hobbies')
    // ->where('user_id', $request->user_id)
    // ->update($data))
    //   {
    //           $res['response'] = "success";
    //          $res['message'] = "Member info  has been updated successfully";
    
    //     echo json_encode($res);
    //   }
    //     else{
           
    //          $res['response'] = "error";
    //          $res['message'] = " updation failed";
    
    //     echo json_encode($res);
    //     }
 }
 
 
 
   public function update_attitude(Request $request){
    
    $data =
    [
        'affection'=>$request ->affection,
         'humor'=>$request ->humor,
          'political_views'=>$request ->political_views,
           'religious_service'=>$request ->religious_service,
           
                  
    ];
    $tableName = "attitudes";
        $tableWhere = "user_id";
        $tableWhereValue = $request->user_id;
        if(DB::table($tableName)->where($tableWhere, $tableWhereValue)->count())
        {
            if(DB::table($tableName)->where($tableWhere, $tableWhereValue)->where($data)->first())
            {
                $res['response'] = "success";
                $res['message'] = "Data updated with no changes";
            }else{
                if(DB::table($tableName)->where($tableWhere, $tableWhereValue)->update($data))
                {
                        $res['response'] = "success";
                        $res['message'] = "Member info  has been updated successfully";
                }else{
                        $res['response'] = "error";
                        $res['message'] = "Updation failed";
                }
            }
            
        }else{
            $data[$tableWhere] = $tableWhereValue;
            if(DB::table($tableName)->insert($data))
            {
                $res['response'] = "success";
                $res['message'] = "Member info  has been updated successfully";
            }else{
                $res['response'] = "error";
                $res['message'] = "Member info updation failed";
            }
        }
        echo json_encode($res); 
    //     if(
    // DB::table('attitudes')
    // ->where('user_id', $request->user_id)
    // ->update($data))
    //   {
    //           $res['response'] = "success";
    //          $res['message'] = "Member info  has been updated successfully";
    
    //     echo json_encode($res);
    //   }
    //     else{
           
    //          $res['response'] = "error";
    //          $res['message'] = " updation failed";
    
    //     echo json_encode($res);
    //     }
 }
   public function update_user_langauges(Request $request)
   {
       $data = [
            
            'mothere_tongue'=>$request ->mothere_tongue,
            'known_languages'=>$request ->known_languages,
        ];
        
        if(DB::table('members')->where('user_id', $request->user_id)->update($data))
        {
                $res['response'] = "success";
                $res['message'] = "Member lanugage has been updated successfully";
        }else{
                $res['response'] = "error";
                $res['message'] = "Updation failed";
        }
        
        echo json_encode($res);
   }
   public function update_address(Request $request)
   {
        
        $data = [
            'country_id'=>$request ->country_id,
            'state_id'=>$request ->state_id,
            'city_id'=>$request ->city_id,
            'postal_code'=>$request ->postal_code,
            'type'=>'present',
        ];
        $tableName = "addresses";
        $tableWhere = "user_id";
        $tableWhereValue = $request->user_id;
        if(DB::table($tableName)->where($tableWhere, $tableWhereValue)->count())
        {
            if(DB::table($tableName)->where($tableWhere, $tableWhereValue)->where($data)->first())
            {
                $res['response'] = "success";
                $res['message'] = "Data updated with no changes";
            }else{
                if(DB::table($tableName)->where($tableWhere, $tableWhereValue)->update($data))
                {
                        $res['response'] = "success";
                        $res['message'] = "Member info  has been updated successfully";
                }else{
                        $res['response'] = "error";
                        $res['message'] = "Updation failed";
                }
            }
            
        }else{
            $data[$tableWhere] = $tableWhereValue;
            if(DB::table($tableName)->insert($data))
            {
                $res['response'] = "success";
                $res['message'] = "Member info  has been updated successfully";
            }else{
                $res['response'] = "error";
                $res['message'] = "Member info updation failed";
            }
        }
        echo json_encode($res); 
        // if(DB::table('addresses')->where($data)->first()){
        //         $res['response'] = "error";
        //         $res['message'] = "No Change";
        // }else{
        // if(DB::table('addresses')->where('user_id', $request->user_id)->update($data))
        // {
        //         $res['response'] = "success";
        //         $res['message'] = "Member info  has been updated successfully";
        // }else{
        //         $res['response'] = "error";
        //         $res['message'] = "Updation failed";
        // }
        // }
        // echo json_encode($res);
        // print_r($data);
     }
 
   public function update_residency(Request $request){
    
    $data =
    [
        'birth_country_id'=>$request ->birth_country_id,
         'recidency_country_id'=>$request ->recidency_country_id,
          'growup_country_id'=>$request ->growup_country_id,
           'immigration_status'=>$request ->immigration_status,
    ];
        if(
    DB::table('recidencies')
    ->where('user_id', $request->user_id)
    ->update($data))
       {
              $res['response'] = "success";
             $res['message'] = "Member info  has been updated successfully";
    
        echo json_encode($res);
       }
        else{
           
             $res['response'] = "error";
             $res['message'] = " updation failed";
    
        echo json_encode($res);
        }
 }
 
  public function update_spiritual(Request $request){
    
    $data =
    [
        'religion_id'=>$request ->religion_id,
         'caste_id'=>$request ->caste_id,
          'sub_caste_name'=>$request ->sub_caste_name,
           'ethnicity'=>$request ->ethnicity,
           'manglik'=>$request->manglik,
            'personal_value'=>$request ->personal_value,
           'family_value_id'=>$request ->family_value_id,
           'community_value'=>$request ->community_value,

        ];
        $tableName = "spiritual_backgrounds";
        $tableWhere = "user_id";
        $tableWhereValue = $request->user_id;
        if(DB::table($tableName)->where($tableWhere, $tableWhereValue)->count())
        {
            if(DB::table($tableName)->where($tableWhere, $tableWhereValue)->where($data)->first())
            {
                $res['response'] = "success";
                $res['message'] = "Data updated with no changes";
            }else{
                if(DB::table($tableName)->where($tableWhere, $tableWhereValue)->update($data))
                {
                        $res['response'] = "success";
                        $res['message'] = "Member info  has been updated successfully";
                }else{
                        $res['response'] = "error";
                        $res['message'] = "Updation failed";
                }
            }
            
        }else{
            $data[$tableWhere] = $tableWhereValue;
            if(DB::table($tableName)->insert($data))
            {
                $res['response'] = "success";
                $res['message'] = "Member info  has been updated successfully";
            }else{
                $res['response'] = "error";
                $res['message'] = "Member info updation failed";
            }
        }
        echo json_encode($res);
    //     if(
    // DB::table('spiritual_backgrounds')
    // ->where('user_id', $request->user_id)
    // ->update($data))
    //   {
    //           $res['response'] = "success";
    //          $res['message'] = "Member info  has been updated successfully";
    
    //     echo json_encode($res);
    //   }
    //     else{
           
    //          $res['response'] = "error";
    //          $res['message'] = " updation failed";
    
    //     echo json_encode($res);
    //     }
 }
 
  public function update_astrologies(Request $request){
     $isData=DB::table('astrologies')->where('user_id', $request->user_id)->count();
     
     if($isData){
        $data =
        [
            'sun_sign'=>$request ->sun_sign,
             'moon_sign'=>$request ->moon_sign,
              'time_of_birth'=>$request ->time_of_birth,
               'city_of_birth'=>$request ->city_of_birth    ,
            'created_at'=>$request ->created_at,
              
        ];
        if(DB::table('astrologies')->where('user_id', $request->user_id)->update($data))
       {
              $res['response'] = "success";
             $res['message'] = "Member info  has been updated successfully";
    
        echo json_encode($res);
       }
        else{
           
             $res['response'] = "error";
             $res['message'] = " updation failed";
    
        echo json_encode($res);
        }
        
     }
     else {
         $data =
        [
            'user_id'=>$request->user_id,
            'sun_sign'=>$request ->sun_sign,
             'moon_sign'=>$request ->moon_sign,
              'time_of_birth'=>$request ->time_of_birth,
               'city_of_birth'=>$request ->city_of_birth    ,
            'created_at'=>$request ->created_at,
              
        ];
        if(DB::table('astrologies')->insert($data)){
            $res['response'] = "success";
             $res['message'] = "Member info  has been updated successfully";
    
        echo json_encode($res);
        }
        else{
            $res['response'] = "error";
             $res['message'] = " updation failed";
    
        echo json_encode($res);
        }
     }
 }
 
  public function update_family_info(Request $request){
    
    $data =
    [
        'father'=>$request ->father,
         'fatherdesc'=>$request ->fatherdesc,
          'father_number'=>$request ->father_number,
           'mother'=>$request ->mother  ,
        'motherdesc'=>$request ->motherdesc,
        'mother_number'=>$request ->mother_number,
        'sibling'=>$request ->sibling,
        'sibling_desc'=>$request ->sibling_desc,

          
    ];
        $tableName = "families";
        $tableWhere = "user_id";
        $tableWhereValue = $request->user_id;
        if(DB::table($tableName)->where($tableWhere, $tableWhereValue)->count())
        {
            if(DB::table($tableName)->where($tableWhere, $tableWhereValue)->where($data)->first())
            {
                $res['response'] = "success";
                $res['message'] = "Data updated with no changes";
            }else{
                if(DB::table($tableName)->where($tableWhere, $tableWhereValue)->update($data))
                {
                        $res['response'] = "success";
                        $res['message'] = "Member info  has been updated successfully";
                }else{
                        $res['response'] = "error";
                        $res['message'] = "Updation failed";
                }
            }
            
        }else{
            
            $data[$tableWhere] = $tableWhereValue;
            if(DB::table($tableName)->insert($data))
            {
                $res['response'] = "success";
                $res['message'] = "Member info  has been updated successfully";
            }else{
                $res['response'] = "error";
                $res['message'] = "Member info updation failed";
            }
            
        }
        echo json_encode($res);
        
    //     if(
    // DB::table('families')
    // ->where('user_id', $request->user_id)
    // ->update($data))
    //   {
    //           $res['response'] = "success";
    //          $res['message'] = "Member info  has been updated successfully";
    
    //     echo json_encode($res);
    //   }
    //     else{
           
    //          $res['response'] = "error";
    //          $res['message'] = " updation failed";
    
    //     echo json_encode($res);
    //     }
 }
 
 public function update_partner_expectation(Request $request){
    
    $data =
    [
        'general'=>$request ->general,
        'height'=>$request ->height,
        'weight'=>$request ->weight,
        'marital_status_id'=>$request ->marital_status_id,
        'children_acceptable'=>$request ->children_acceptable,
        'residence_country_id'=>$request ->residence_country_id,
        'religion_id'=>$request ->religion_id,
        'caste_id'=>$request ->caste_id,
        'sub_caste_id'=>$request ->sub_caste_id ,
        'education'=>$request ->education,
        'profession'=>$request ->profession,
        'smoking_acceptable'=>$request ->smoking_acceptable,
        'drinking_acceptable'=>$request ->drinking_acceptable,
        'diet'=>$request ->diet,
        'body_type'=>$request ->body_type,
        'personal_value'=>$request ->personal_value,
        'manglik'=>$request ->manglik,
        'language_id'=>$request ->language_id,
        'family_value_id'=>$request ->family_value_id,
        'preferred_country_id'=>$request ->preferred_country_id,
        'preferred_state_id'=>$request ->preferred_state_id,
        'complexion'=>$request ->complexion,
         
    ];
    
        $tableName = "partner_expectations";
        $tableWhere = "user_id";
        $tableWhereValue = $request->user_id;
        if(DB::table($tableName)->where($tableWhere, $tableWhereValue)->count())
        {
            if(DB::table($tableName)->where($tableWhere, $tableWhereValue)->where($data)->first())
            {
                $res['response'] = "success";
                $res['message'] = "Data updated with no changes";
            }else{
                if(DB::table($tableName)->where($tableWhere, $tableWhereValue)->update($data))
                {
                        $res['response'] = "success";
                        $res['message'] = "Member info  has been updated successfully";
                }else{
                        $res['response'] = "error";
                        $res['message'] = "Updation failed";
                }
            }
            
        }else{
            
            $data[$tableWhere] = $tableWhereValue;
            if(DB::table($tableName)->insert($data))
            {
                $res['response'] = "success";
                $res['message'] = "Member info  has been updated successfully";
            }else{
                $res['response'] = "error";
                $res['message'] = "Member info updation failed";
            }
            
        }
        echo json_encode($res);
        
    //     if( DB::table('partner_expectations')->where('user_id', $request->user_id)->update($data))
    //   {
    //         $res['response'] = "success";
    //         $res['message'] = "Member info  has been updated successfully";
    //   }else{
    //          $res['response'] = "error";
    //          $res['message'] = " updation failed";
    //     }
    //     echo json_encode($res);
 }
 
 
 public function delete_education(Request $request)
 {
     
     if(DB::table('education')->where('id', $request->id)->delete())
     {
        $res['response'] = "success";
        $res['message'] = "Data Deleted successfully";
     }
     else{
        $res['response'] = "error";
        $res['message'] = "Deleted failed";
     }
     echo json_encode($res);
 }
 
 public function insert_education(Request $request)
 {
       $data =
        [
            'user_id'=>$request->user_id,
            'degree'=>$request ->degree,
            'institution'=>$request ->institution,
            'start'=>$request ->start,
            'end'=>$request ->end,
            'present'=>$request ->present
                
              
        ];
        
         if(DB::table('education')->insert($data)){
             $res['response'] = "success";
             $res['message'] = "Member info  has been Inserted successfully";
         }
         
         else {
              $res['response'] = "error";
        $res['message'] = " Insert failed";
         }
          echo json_encode($res);
 }
 
 public function delete_career(Request $request)
 {
     
     if(DB::table('careers')->where('id', $request->id)->delete())
     {
        $res['response'] = "success";
        $res['message'] = "Data Deleted successfully";
     }
     else{
        $res['response'] = "error";
        $res['message'] = "Deleted failed";
     }
     echo json_encode($res);
 }
 
 public function insert_career(Request $request)
 {
       $data =
        [
            'user_id'=>$request->user_id,
            'designation'=>$request ->designation,
            'packageis'=>$request ->packageis,
            'company'=>$request ->company,
        ];
        
         if(DB::table('careers')->insert($data)){
             $res['response'] = "success";
             $res['message'] = "Member info  has been Inserted successfully";
         }
         
         else {
            $res['response'] = "error";
            $res['message'] = " Insert failed";
         }
          echo json_encode($res);
 }
 
  public function insert_shortlist_user(Request $request)
 {
      if(DB::table('shortlists')->where('shortlisted_by', $request ->shortlisted_by)->first())
     {
        $res['response'] = "error";
        $res['message'] = "Member has been already Shortlisted";
     }
     else{
        $data =
        [
            'user_id'=>$request->userid,
            'shortlisted_by'=>$request ->shortlisted_by
        ];
        
         if(DB::table('shortlists')->insert($data)){
             $res['response'] = "success";
             $res['message'] = "Member has been Shortlisted successfully";
         }
         
         else {
            $res['response'] = "error";
            $res['message'] = " Shortlisted failed";
         } 
     }
       
          echo json_encode($res);
 }
  public function report_user(Request $request)
 {
      if(DB::table('reported_users')->where('user_id', $request->userid)->where('reported_by', $request->reported_by)->first())
     {
        $res['response'] = "error";
        $res['message'] = "Member has been already Shortlisted";
     }
     else{
        $data =
        [
            'user_id'=>$request->userid,
            'reported_by'=>$request ->reported_by,
            'reason'=>$request ->reason,
        ];
        
         if(DB::table('reported_users')->insert($data)){
             $res['response'] = "success";
             $res['message'] = "Member has been reported successfully";
         }
         
         else {
            $res['response'] = "error";
            $res['message'] = " Shortlisted failed";
         } 
     }
       
          echo json_encode($res);
 }
 
   public function insert_ignored_user(Request $request)
 {
      if(DB::table('ignored_users')->where('ignored_by', $request ->ignored_by)->first())
     {
        $res['response'] = "error";
        $res['message'] = "Member has been already Ignored";
     }
     else{
            
       $data =
        [
            'user_id'=>$request->userid,
            'ignored_by'=>$request ->ignored_by
        ];
        
         if(DB::table('ignored_users')->insert($data)){
             $res['response'] = "success";
             $res['message'] = "Member has been Ignored successfully";
         }
         
         else {
            $res['response'] = "error";
            $res['message'] = " Ignored failed";
         }
          
     }
      echo json_encode($res);
 } 
 public function insert_express_interests_user(Request $request)
 {
     
       if(DB::table('express_interests')->where('interested_by', $request ->interested_by)->first())
     {
        $res['response'] = "error";
        $res['message'] = "Member has been already Intrested";
     }else{
         
         $userExistId = DB::table('members')->where('user_id', $request->userid)->get();
               if($userExistId)
              {
                  $remaining_interest = 0;
                   foreach ($userExistId as $userExistId) {
                       $remaining_interest = $userExistId->remaining_interest;
                     }
                            
            if($remaining_interest >= 1){
                 $member  = Member::where('user_id',$request->userid)->first();
                                      $member->remaining_interest    = $remaining_interest - 1;
                                      $member->save();
                                      
                                       $data =
                                               [
                                                  'user_id'=>$request->userid,
                                                  'interested_by'=>$request ->interested_by
                                                ];
                          
                           if(DB::table('express_interests')->insert($data)){
                               $res['response'] = "success";
                               $res['message'] = "Member has been Intrested successfully";
                           }
                           
                           else {
                              $res['response'] = "error";
                              $res['message'] = " Intrested failed";
                           } 
             }else{
                  $res['response'] = "error";
                $res['message'] = "Your intrest limit crossed ... please upgrade your plan.";
                
             }
                     
        }
       
     }
       
          echo json_encode($res);
 }
 
 public function upload_payment_proof(Request $request)
 {
    // 'userid': form.userid.toString(),
    //   'package': form.packageID.toString(),
    //   'transitionid': form.trasitionID.toString(),
    //   'transitiondetails':

    // $upload = new Upload;
    // $extension = strtolower($request->file('image')->getClientOriginalExtension());
    // $size = $request->file('image')->getSize();
    // if($request->file('image')){
    //     $file= $request->file('image');
    //     $size = $img->filesize();
    //     $filename= date('YmdHi').$file->getClientOriginalName();
    //     $file-> move(public_path('public/uploads/Image/'), $filename);
     

    //         $upload->extension = $extension;
    //         $upload->file_original_name = $file->getClientOriginalName();
    //         $upload->file_name = 'public/uploads/Image/'.$filename;
    //         $upload->user_id = $request->userid;
    //         $upload->type = 'image';
    //         $upload->file_size = $size;
    //         $upload->save();
           

    //        $package_payment                                = new PackagePayment;
    //       $package_payment->payment_code                  = date('ymd-His');
    //       $package_payment->user_id                       = Auth::user()->id;
    //       $package_payment->package_id                    = $request->package_id;
    //       $package_payment->payment_method                = 'manual_payment';
    //       $package_payment->payment_status                = 'Due';
    //       $package_payment->amount                        = $request->amount;
    //       $package_payment->payment_details               = '';
    //       $package_payment->offline_payment               = 1;
    //       $package_payment->custom_payment_name           = get_setting($request->payment_option.'_name');
    //       $package_payment->custom_payment_transaction_id = $request->transaction_id;
    //       $package_payment->custom_payment_proof          = $request->payment_proof;
    //       $package_payment->custom_payment_details        = $request->payment_details;

    //       $package_payment->save();
        $packageDetails = DB::table('packages')->where('id',$request->package)->first();

          $package_payment                                = new PackagePayment;
          $package_payment->payment_code                  = date('ymd-His');
          $package_payment->user_id                       = $request->userid;
          $package_payment->package_id                    = $request->package;
          $package_payment->payment_method                = 'manual_payment';
          $package_payment->payment_status                = 'Due';
          $package_payment->amount                        = $packageDetails->price;
          $package_payment->payment_details               = '';
          $package_payment->offline_payment               = 1;
          $package_payment->custom_payment_name           = get_setting('manual_payment_2_name');
          $package_payment->custom_payment_transaction_id = $request->transitionid;
          $package_payment->custom_payment_proof          = $request->image;
          $package_payment->custom_payment_details        = $request->transitiondetails;

        if($package_payment->save())
        {
            $res['response'] = "success";
            $res['message'] = "Upload successfull. Please wait for approval.";
        }else
        {
            $res['response'] = "error";
            $res['message'] = "Payment failed. Prefer website payment upload";
        }
            
     echo json_encode($res);
 }
 public function upload_happy_story(Request $request)
 {
     $res['response'] = "error";
     $res['message'] = " story upload failed";
     echo json_encode($res);
 }
 
 public function upload_member_gallery(Request $request){
     
    $userExistId = DB::table('members')->where('user_id', $request->userid)->get();
      if($userExistId)
     {
         $remaing_photo_count = 0;
          foreach ($userExistId as $userExistId) {
              $remaing_photo_count = $userExistId->remaining_photo_gallery;
            }
            
            if($remaing_photo_count >= 1){
                      $upload = new Upload;
                       $extension = strtolower($request->file('image')->getClientOriginalExtension());
                        $size = $request->file('image')->getSize();
                       if($request->file('image')){
                               $file= $request->file('image');
                               //  $size = $img->filesize();
                               $filename= date('YmdHi').$file->getClientOriginalName();
                               $file-> move(public_path('public/uploads/Image/'), $filename);
                             
                   
                                   $upload->extension = $extension;
                                   $upload->file_original_name = $file->getClientOriginalName();
                                   $upload->file_name = 'public/uploads/Image/'.$filename;
                                   $upload->user_id = $request->userid;
                                   $upload->type = 'image';
                                   $upload->file_size = $size;
                                   $upload->save();
                                   
                                    
                                      $member  = Member::where('user_id',$request->userid)->first();
                                      $member->remaining_photo_gallery    = $remaing_photo_count - 1;
                                      $member->save();
        
                                   $data =
                                    [
                                        'user_id'=>$request->userid,
                                        'image'=>$upload->id
                                    ];
        
                                  if(DB::table('gallery_images')->insert($data)){
                                      $res['response'] = "success";
                                      $res['message'] = "Image Uploaded successfully";
                                       echo json_encode($res);
                                  }else{
                                    
                                      $res['response'] = "error";
                                      $res['message'] = "Image upload failed";
                             
                                 echo json_encode($res);
                                 }
                                 
            
        }
            }else{
                $res['response'] = "error";
                $res['message'] = "Your gallery upload out of limit ... please upgrade your plan.";
                
                echo json_encode($res);
             }
       
     }
        
    }
 
 public function delete_gallery_image_user(Request $request){
     $userExistId = DB::table('members')->where('user_id', $request->userid)->get();
      if($userExistId)
     {
         $remaing_photo_count = 0;
          foreach ($userExistId as $userExistId) {
              $remaing_photo_count = $userExistId->remaining_photo_gallery;
            }
            
                                      $member  = Member::where('user_id',$request->userid)->first();
                                      $member->remaining_photo_gallery    = $remaing_photo_count + 1;
                                      $member->save();
        
                                   $data =
                                    [
                                        'user_id'=>$request->userid,
                                        'id'=>$request->imageid
                                    ];
        
                                  if(DB::table('gallery_images')->where($data)->delete())
                                        {
                                           $res['response'] = "success";
                                           $res['message'] = "Data Deleted successfully";
                                        }
                                        else{
                                           $res['response'] = "error";
                                           $res['message'] = "Deleted failed";
                                        }
                                        echo json_encode($res);
                                 
            
       
     }
 }
 
 public function delete_shortlist_user(Request $request)
 {
           $data =
                   [
                       'user_id'=>$request->userid,
                       'shortlisted_by'=>$request->memberid
                   ];
     if(DB::table('shortlists')->where($data)->delete())
     {
        $res['response'] = "success";
        $res['message'] = "Data Deleted successfully";
     }
     else{
        $res['response'] = "error";
        $res['message'] = "Deleted failed";
     }
     echo json_encode($res);
 } 
 
 public function delete_ignored_user(Request $request)
 {
           $data =
                   [
                       'user_id'=>$request->userid,
                       'ignored_by'=>$request->memberid
                   ];
     if(DB::table('ignored_users')->where($data)->delete())
     {
        $res['response'] = "success";
        $res['message'] = "Data Deleted successfully";
     }
     else{
        $res['response'] = "error";
        $res['message'] = "Deleted failed";
     }
     echo json_encode($res);
 } 
 public function delete_intrested_user(Request $request)
 {
           $data =
                   [
                       'user_id'=>$request->userid,
                       'interested_by'=>$request->memberid
                   ];
     if(DB::table('express_interests')->where($data)->delete())
     {
        $res['response'] = "success";
        $res['message'] = "Data Deleted successfully";
     }
     else{
        $res['response'] = "error";
        $res['message'] = "Deleted failed";
     }
     echo json_encode($res);
 }
 
 
 public function get_contact_information(Request $request)
 {
     $id = $request->userid; 
     
     $data = [ 'user_id' => $request->memberid,'viewed_by' => $request->userid, ];
     
     $res['phone'] = 'Hidden';
     $res['email'] = 'Hidden';
     $res['father_number'] = 'Hidden';
     $res['mother_number'] = 'Hidden';
     
     if(DB::table('view_contacts')->where($data)->first())
     {
         $contact =  DB::table('users')
         ->leftJoin('families','families.user_id','=','users.id')
         ->select('users.phone','users.email','families.father_number','families.mother_number')
         ->where('users.id',$request->memberid)
         ->first();
         
         $res['phone'] = $contact->phone??' ';
         $res['email'] = $contact->email??' ';
         $res['father_number'] = $contact->father_number??' ';
         $res['mother_number'] = $contact->mother_number??' ';
     }
      
     echo json_encode($res);
 }
 public function get_member_langauge_info(Request $request)
 {
     $id = $request->userid; 
     $member = DB::table('members')->where('user_id',$id)->first();
     $lang_array=array();
     if($member->known_languages)
     {
         foreach(json_decode($member->known_languages) as $lang)
         {
            array_push($lang_array, DB::table('member_languages')->where('id',$lang)->first()->name??'' );
         }
     }
    $res['mother_tongue'] = DB::table('member_languages')->where('id',$member->mothere_tongue)->first()->name??' ' ;
    $res['known_languages'] = empty($lang_array)?' ':implode(', ', $lang_array);

     echo json_encode($res);
 }
 
 
  public function insert_user_contact_view(Request $request)
 {
     if(DB::table('view_contacts')->where(['user_id' => $request ->memberid,'viewed_by' => $request ->userid])->first())
     {
        $res['response'] = "error";
        $res['message'] = "Member has been already viewed";
     }
     else{
            $userExistId = DB::table('members')->where('user_id', $request->userid)->get();
               if($userExistId)
              {
                  $remaining_contact_view = 0;
                   foreach ($userExistId as $userExistId) {
                       $remaining_contact_view = $userExistId->remaining_contact_view;
                     }
                            
                            if($remaining_contact_view >= 1){
                                 $member  = Member::where('user_id',$request->userid)->first();
                                                      $member->remaining_contact_view    = $remaining_contact_view   - 1;
                                                      $member->save();
                                                      
                          $data =
                        [
                            'user_id'=>$request->memberid,
                            'viewed_by'=>$request ->userid
                        ];
                        
                         if(DB::table('view_contacts')->insert($data)){
                             $res['response'] = "success";
                             $res['message'] = "Member Contact has been Viewed successfully";
                         }
                         
                         else {
                            $res['response'] = "error";
                            $res['message'] = " Viewed failed";
                         } 
                             }else{
                                  $res['response'] = "error";
                                $res['message'] = "Your contact view limit crossed ... please upgrade your plan.";
                                
                             }
            
            
            
              } 
       
          
     }
      echo json_encode($res);
 } 



 //Payment Related APIs
    public function subscription_purchased_success(Request $request)
    {

        $package = DB::table('packages')->where('id', $request->package_id)->first();
        if($package)
        {
            $pDetails = '{"id":"'.$request->pay_id.'","method":"upi","amount":'.(int)$package->price.',"currency":"INR"}';
            $paymentInfo = array(
                'package_id' => $request->package_id,
                'user_id' => $request->user_id,
                'payment_method' => "razorpay",
                'payment_status' => "Paid",
                'payment_details' => $pDetails,
                'amount' => (int)$package->price,
                'payment_code' => $request->pay_id,
                'offline_payment' => "2",
            );

            DB::table('package_payments')->insert($paymentInfo);
            $res['response'] = "success";
            $res['message'] = "Payment Done. Please Wait for Approval";
        }else{
            $res['response'] = "error";
            $res['message'] = "Selected Package Not Found.";
        }
        echo json_encode($res);
    }

    
 
}


?> 