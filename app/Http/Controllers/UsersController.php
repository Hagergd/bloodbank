<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        
         $users = User::all();

        return view('users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
         
         
        return view('users.add');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //     $validated = $request->validate([
    //     'name' => 'required|unique:name|max:255',
        
    // ],[

    //     'governorate_name.required' =>'يجب ادخال هذا الحق',
    //     'governorate_name.unique' =>'حقل موجود مسبقا ',
        
         
    // ]);
     //dd($request);
              

        User::create([
        'name' => $request->user_name ,
        'email' => $request->email,
        'password' => $request->password,
        'created_by'=>(Auth::user()->name),

    ]);

       //session()->flash('add','تم اضافة القسم بنجاح ');
      
      return redirect('/users');  
    }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = DB::table('users')
                ->where('id', '=', $id)
                ->first();


        
       return view('users.edit',compact('users')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $id = $request->user_id;

      

        $users = User::findOrFail($id);


            $users->update([
                'name' => $request->user_name ,
                'email' => $request->email,
                'password' => $request->password,
                 
            ]);
            
        //session()->flash('Status_Update');
        return redirect('/users');
 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,Request $request)
    {
        $id = $request->id;

       User::find($id)->delete();
        //session()->flash('delete','تم حذف القسم بنجاح');
        return redirect('/users');
    }
}
