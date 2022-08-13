<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Governorate;
use App\Models\City;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $cities = City::all();
         $governorates = Governorate::all();

        return view('city.index',compact('cities','governorates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
     // dd($request);

       City::create([
        'name'=>$request->city_name,
        'governorate_id' => $request->governorate,
        //'created_by'=>(Auth::user()->name),

    ]);

       //session()->flash('add','تم اضافة القسم بنجاح ');
      
      return redirect('/cities');

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
        //
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
        //dd($request);
         $id = $request->id;
        $id2 =Governorate::where('id',$request->governorate)->first()->id;
       
    //     $validated = $request->validate([
    //     'product_name' => 'required|unique:products,product_name|max:255'.$id,
    //     'descreption' => 'required',
    // ],[

    //     'product_name.required' =>'يجب ادخال هذا الحق',
    //     'product_name.unique' =>'حقل موجود مسبقا ',
    //     'descreption.required' => 'يجب ادخال هذا الحق',
         
    // ]);

        $cities= City::findOrFail($id);

        $cities->update([
             
        'name'=>$request->city_name,
        //'governorate_id'=>$request->governorate,
        
        'governorate_id'=>$id2,
        


        ]);


      //session()->flash('edit','تم تعديل القسم بنجاح ');
      
      return redirect('/cities');
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

       City::find($id)->delete();
        //session()->flash('delete','تم حذف القسم بنجاح');
        return redirect('/cities');
    }
}
