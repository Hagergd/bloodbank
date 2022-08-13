<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DonationRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\City;
use App\Models\Client;
use App\Models\BloodType;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DonationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::all();
         $cities = City::all();
         $bloodTypes = BloodType::all();
         $donations =DonationRequest::all();

         return view('donations.index',compact('cities','bloodTypes','clients','donations'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id,Request $request)
    {

         $donations = DonationRequest::where('id', $id)->first();
        return view('donations.show', compact('donations'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id,Request $request)
    {
        $donations = DB::table('donation_requests')
                ->where('id', '=', $id)
                ->first();

 
       
       return view('donations.show',compact('donations'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,Request $request)
    {
        
    }
}
