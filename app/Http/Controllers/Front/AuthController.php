<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\Client;
use App\Models\Governorate;
use App\Models\City;
use App\Models\BloodType;





class AuthController extends Controller
{
    public function clientContactUs()

    {  
        $clients = Client::first();
        $settings = Setting::first();
       return view('front.client-contact-us',compact('settings','clients'));
    }

    public function clientRegister()
    {  
        $governorates = Governorate::all();
        $cities = City::all();
        $bloodtypes = BloodType::all();

       return view('front.create-account',compact('governorates','cities','bloodtypes'));
    }
    
public function clientLogin()
    {  
        

       return view('front.signin-account');
    }
    


}
