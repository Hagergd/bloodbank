<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Mail\ResetPassword;
use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Login;
use App\Models\Token;
//use Iluminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
//use Illuminate\Support\Facades\Rule;
use Illuminate\Validation\Rule;


class AuthController extends Controller
{
    
    public function login(Request $request)
    {
        
        $Validator = Validator()->make($request->all(), [

        'phone' => 'required',
        'password' => 'required',
        ]);

       if ($Validator->fails()) {

            return responseJson(status:0,message:$Validator->errors()->first(),data:$Validator->errors());  
       } 

       $client = Client::where('phone',$request->phone)->first();

       if ($client) {
            

           if (Hash::check($request->password,$client->password)) {
               return redirect('/'); 
              return responseJson(status:1,message:"م الاضافة بنجاح ",data:[
                'api_token'=>$client->api_token,
                'client'=>$client 
                ]);
               

           } else {
               
                 return responseJson(status:0,message:"يانات غير صحيحة ",data:['nn']); 
               
              }
           

       } else

        {
          return responseJson(status:0,message:"يانات غير صحيحة ",data:['mm']);   
       }
       

    }




    public function register(Request $request)
    {
        
      $Validator = Validator()->make($request->all(), [

        'name' => 'required',
        'phone' => 'required',
        'password' => 'required',
        'd_o_b' => 'required',
        'email' => 'required',
        'last_donation_date' => 'required',
        'blood_type_id' => 'required',
        'city_id' => 'required',
        'phone' => 'required',
        'is_active' => '1',

      ]);

      if ($Validator->fails()) {

        return responseJson(status:0,message:$Validator->errors()->first(),data:$Validator->errors());
           
       } 
        $code= rand(1111,9999);

       $request->merge(['password'=>bcrypt($request->password),'pin_code'=>$code]);

       $client = Client::create($request->all());

       $client->api_token = $this->quickRandom(60);//Str::random(60);

       //$client->city()->attach($request->city_id);

       //$client->bloodType()->attach($request->blood_type_id);


        $client->save();
        return redirect('/');


        return responseJson(status:1,message:'تم الاضافة بنجاح ',data:[
            'api_token'=>$client->api_token,
            'client'=>$client
        ]);

        }

            public static function quickRandom($length = 16)
        {
            $pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

            return substr(str_shuffle(str_repeat($pool, 5)), 0, $length);
    }





    public function resetPassword(Request $request)
    {
        
       $user = Client::where('phone',$request->phone)->first();

       if ($user) {
             
             $code = rand(1111,9999);

             $update = $user->update(['pin_code'=>$code]);  


           if ($update) {
             //sms 

             //emails
            
            Mail::to($user->email)
                 ->bcc("gogoyoyo646@gmail.com")
                 ->send(new ResetPassword($user));

              return responseJson(status:1,message:"برجاء فحص هاتفك ",data:[
                'pin_code_test'=> $code,

                ]);

            } else {
               
                return responseJson(status:0,message:"حاول مرة اخري ",data:[]); 

            }
           

       } else

        {
          return responseJson(status:0,message:"رقم التلفون غير صحيح ",data:[]);   
       }
       

    }



    public function newPassword(Request $request)

    {
        $Validator = Validator()->make($request->all(), [

        'pin_code' => 'required',
        'password' => 'required|confirmed',

        ]);

       if ($Validator->fails()) {

            return responseJson(status:0,message:$Validator->errors()->first(),data:$Validator->errors());  
       } 

       $client = Client::where('pin_code',$request->pin_code)->where('pin_code','!=',0)->first();

       if ($client) {

        //$code= rand(1111,9999);

       //$request->merge(['password'=>bcrypt($request->password),'pin_code'=>$code]);

            $client->password = bcrypt($request->password);

            $client->pin_code =rand(1111,9999); 
       //$clients = Client::update($request->all());

           if ($client->save()) {

              return responseJson(status:1,message:"تم تغيير كلمة المرور بنجاح ",data:[
                'new-password'=>$client->password,
                 
                ]);

           } else {
               
                return responseJson(status:0,message:"حاول مرة اخري ",data:[]); 

           }
           

       } else

        {
          return responseJson(status:0,message:"هذا الكود غير صحيح ",data:[]);   
       }
       

    }

    public function profile(Request $request)
    {
        $Validator = Validator()->make($request->all(), [

        'password' => 'confirmed',
        'email' =>Rule::unique('clients')->ignore($request->user()->id),
        'phone' =>Rule::unique('clients')->ignore($request->user()->id),

        ]);

       if ($Validator->fails()) {

            return responseJson(status:0,message:$Validator->errors()->first(),data:$Validator->errors());  
       } 

       $loginUser = $request->user();

          
       $loginUser->update($request->all());

       if ($request->has('password')) {
           
           $loginUser->password = bcrypt($request->password);
           
       } 

          $loginUser->save();
           return responseJson(status:1,message:"تم التحديث بنجاح ",data:[]); 

       if ($request->has('city_id')) {
           
           $loginUser->cities()->detach($request->city_id);
           $loginUser->cities()->attach($request->city_id); 
           
       } 

       if ($request->has('blood_type_id')) {

           //$bloodType_id=BloodType::where('name',$request->blood_type)->first();
           $loginUser->bloodTypes()->detach($request->blood_type_id);
           $loginUser->bloodTypes()->attach($request->blood_type_id); 
           
       } 

       
       

    }


    public function registerToken(Request $request)

    {
        $Validator = Validator()->make($request->all(), [

        'token' => 'required',
        'platform' => 'required|in:android,ios',

        ]);

       if ($Validator->fails()) {

            return responseJson(status:0,message:$Validator->errors()->first(),data:$Validator->errors());  
       } 

        Token::where('token',$request->token)->delete();

          $data = $request->user()->clientTokens()->create($request->all());
       
           return responseJson(status:1,message:"تم التسجيل بنجاح ",data:[$data]);   
       
       

    }
     


      public function removeToken(Request $request)

    {
        $Validator = Validator()->make($request->all(), [

        'token' => 'required',
      

        ]);

       if ($Validator->fails()) {

            return responseJson(status:0,message:$Validator->errors()->first(),data:$Validator->errors());  
       } 

        Token::where('token',$request->token)->delete();

         
       
           return responseJson(status:1,message:"تم الحذف بنجاح ",data:[]);   
       
       

    }




}
