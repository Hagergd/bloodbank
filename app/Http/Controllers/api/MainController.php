<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Governorate;
use App\Models\City;
use App\Models\Post;
use App\Models\Category;
use App\Models\BloodType;
use App\Models\Setting;
use App\Models\ClientPost;
use App\Models\Contact;
use App\Models\Client;
use App\Models\Token;
use App\Models\DonationRequest;
use App\Models\Notification;



class MainController extends Controller
{
    
    public function governorates(Request $request)
    {
        $governorates = Governorate::all();

        return responseJson(status:1,message:'success',data:$governorates);
    }

    
    public function cities(Request $request)
    {
        $cities = City::where(function($query) use($request){

            if ($request->has('governorate_id')) {

                $query->where('governorate_id',$request->governorate_id);
            }

        })->get();

        return responseJson(status:1,message:'success',data:$cities);
    }

    public function categories(Request $request)
    {
        $categories = Category::all();

        return responseJson(status:1,message:'success',data:$categories);
    }

    public function posts(Request $request)
    {
        $posts = Post::where(function($query) use($request){

            if ($request->has('category_id')) {

                $query->where('category_id',$request->category_id);
            };

        })->get();

        return responseJson(status:1,message:'success',data:$posts);
    }

    public function post(Request $request)
    {
        $post = Post::where(function($query) use($request){

            if ($request->has('post_id')) {

                $query->where('id',$request->post_id);
            };

        })->get();

        return responseJson(status:1,message:'success',data:$post);
    }

    public function bloodTypes(Request $request)
    {
        $bloodTypes = BloodType::all();

        return responseJson(status:1,message:'success',data:$bloodTypes);
    }

    public function settings(Request $request)
    {
        $settings = Setting::all();

        return responseJson(status:1,message:'success',data:$settings);
    }

    public function contactUs(Request $request)
    {
        $contact = Contact::all();

        return responseJson(status:1,message:'success',data:$contact);
    }


     
     public function listFavourites(Request $request)
    {
        $favourites = ClientPost::where(function($query) use($request){

            if ($request->has('client_id')) {

                $query->where('client_id',$request->client_id);
            };

        })->get();

        //$favourites = $request->user()->posts()->clients();
        return responseJson(status:1,message:'success',data:$favourites);
    }


    public function toggleFavourites(Request $request)
    {
      $Validator = Validator()->make($request->all(), [

        'post_id' => 'required|exists:posts,id',
        

      ]);

      if ($Validator->fails()) {

        return responseJson(status:0,message:$Validator->errors()->first(),data:$Validator->errors());
           
       } 

       $toggle =$request->user()->posts()->toggle($request->post_id);

       return responseJson(status:1,message:'success',data:$toggle );
    }
    

     
    public function donationRequests(Request $request)
    {
      $Validator = Validator()->make($request->all(), [

        'patient_name' => 'required',
        'patient_phone' => 'required',
        'patient_age' => 'required',
        'hospital_name' => 'required',
        'hospital_address' => 'required',
        'bags_num' => 'required',
        'city_id' => 'required',
        

      ]);

      if ($Validator->fails()) {

        return responseJson(status:0,message:$Validator->errors()->first(),data:$Validator->errors());
           
       } 

       $donationRequest = $request->user()->donationRequests()->create($request->all());
       //return responseJson(status:1,message:'success',data:$donationRequest);
    



     $clientIds = $donationRequest->city->clients()->whereHas('bloodType',function ($fn) use ($request,$donationRequest){$fn->where('blood_types.id',$donationRequest->blood_type_id);})->pluck('clients.id')->toArray();


           //return  ($clientIds);

       if (count($clientIds)) {

               $notification = $donationRequest->notifications()->create([
                 'title'=>'يوجد حالة تبرع قريبة منك  ',
                 'content'=>$donationRequest->bloodType->name.'نحتاج لتبرع بالدم لفصيلة ',

               ]);

               $notification->clientNotifications()->attach($clientIds);

            
        } else {

                 return responseJson(status:0,message:$Validator->errors()->first(),data:$Validator->errors());
        }



        $tokens =Token::whereIn('client_id',$clientIds)->pluck('token')->toArray();

            return $tokens;
    
        if (count($tokens)) {}

    }
    
    public function donations(Request $request)
    {
        $donations = DonationRequest::all();

        return responseJson(status:1,message:'success',data:$donations);
    }
    

    public function donation(Request $request)
    {
        $donation = $request->user()->donationRequests()->latest()->paginate(2);

        return responseJson(status:1,message:'success',data:$donation);
    }



    public function notifications(Request $request)
    {
        $notification = $request->user()->clientNotification()->latest()->paginate(2);

        return responseJson(status:1,message:'success',data:$notification);
    }


    public function notificationsSetting(Request $request)
    {
           // $loginUser = $request->user();
           
           // $loginUser->clientGovernorate()->sync($request->governorate_id);
           // $loginUser->bloodTypeClients()->sync($request->blood_type_id); 
           
       // } 


       //  $loginUser->save();

       //  return responseJson(status:1,message:'success',data:[]);
    }


}
