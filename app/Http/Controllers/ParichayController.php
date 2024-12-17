<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Mail;
use Auth;
use App\User;
use App\Models\Member;
use App\Models\Parichay;
use App\Models\Matrimonial;
use Hash;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
// use DB;

class ParichayController extends Controller
{
    public function admin_parichay()
    {
        return view('admin.parichay');
    }
 
   
   public function parichayview_details($id)
        {
            return view('admin.parichayview',compact('id'));
            // echo "dxfgchbj";
        }
    

}