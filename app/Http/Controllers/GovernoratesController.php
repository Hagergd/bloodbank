<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Governorate;
use App\Models\City;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class GovernoratesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $governorates = Governorate::all();

        return view('governorate.index',compact('governorates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $governorates = Governorate::all();

        return view('governorate.add',compact('governorates'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
    //     $validated = $request->validate([
    //     'name' => 'required|unique:name|max:255',
        
    // ],[

    //     'governorate_name.required' =>'يجب ادخال هذا الحق',
    //     'governorate_name.unique' =>'حقل موجود مسبقا ',
        
         
    // ]);


       Governorate::create([
        'name'=>$request->governorate_name,
        //'created_by'=>(Auth::user()->name),

    ]);

       //session()->flash('add','تم اضافة القسم بنجاح ');
      
      return redirect('/governorates');

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
        $governorate = DB::table('governorates')
                ->where('id', '=', $id)
                ->first();

 
          
       return view('governorate.edit',compact('governorate')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {

        $id = $request->id;
       
    //     $validated = $request->validate([
    //     'section_name' => 'required|unique:sections,section_name|max:255'.$id,
    //     'descreption' => 'required',
    // ],[

    //     'section_name.required' =>'يجب ادخال هذا الحق',
    //     'section_name.unique' =>'حقل موجود مسبقا ',
    //     'descreption.required' => 'يجب ادخال هذا الحق',
         
    // ]);

        $governorates= Governorate::find($id);

        $governorates->update([
             
        'name'=>$request->governorate_name,
        
        //'created_by'=>(Auth::user()->name),


        ]);


      //session()->flash('edit','تم تعديل القسم بنجاح ');
      
      return redirect('/governorates');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
         $id = $request->id;

       Governorate::find($id)->delete();
        //session()->flash('delete','تم حذف القسم بنجاح');
        return redirect('/governorates');
    }
}
