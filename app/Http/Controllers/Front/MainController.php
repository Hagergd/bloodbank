<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\DonationRequest;
use App\Models\BloodType;
use App\Models\Governorate;
use App\Models\Client;
use App\Models\City;
use App\Models\Contact;
use App\Models\Setting;



class MainController extends Controller
{ 
    

    public function home()

    {
        $governorates = Governorate::all();
        $bloodtypes = BloodType::all();
        $donations = DonationRequest::paginate(5);
        $posts = Post::take(6)->get();
        $client = Client::first();
        $cities =City::all();

        //auth('client-web')->login($client);

       return view('front.index',compact('posts','donations','bloodtypes','governorates','cities'));
    }

    public function whoAre()
    {
        
       return view('front.who-are-us');
    }

    public function aboutAPP()
    {
        $settings = Setting::first();
       return view('front.about_app',compact('settings'));
    }

    public function toggleFavourite()
    {  
        
       $toggle =$request->user()->posts()->toggle($request->post_id);

       return responseJson(status:1,message:'success',data:$toggle );
        
       
    }

    public function allRequests()
    {
         $clients = Client::all();
         $cities = City::all();
         $bloodtypes = BloodType::all();
         $donations =DonationRequest::all();
         $governorates =Governorate::all();

       return view('front.donation-requests',compact('clients','cities','bloodtypes','donations','governorates'));
    }

    public function articleDetails()
    {
        $post = Post::first();
        $posts =Post::all();
       return view('front.articale-details',compact('post','posts'));
    }

    public function insideRequest($id)
    {
      $donations = DonationRequest::where('id', $id)->first();
       return view('front.inside-request',compact('donations'));
    }

    public function search(Request $request)
    {
        $clients = Client::all();
         $cities = City::all();
         $bloodtypes = BloodType::all();
         $donationn =DonationRequest::all();
         $governorates =Governorate::all();

         $id_type=$request->bloodtype;
         $id_city=$request->city;

      $donations = DonationRequest::where('blood_type_id',$id_type)->where('city_id',$id_city)->get();
       
      // dd($donations);

       return view('front.donation-requests',compact('donationn','cities','bloodtypes','clients','governorates','donations'));

      
    }

    public function postShow($id)
    {
      $post = Post::where('id', $id)->first();
       return view('front.articale-details',compact('post'));
    }

}
