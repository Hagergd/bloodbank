@extends('layouts.master')
@section('title')

    
@endsection
@section('css')

    
@endsection
@section('title1')

    
@endsection
@section('title2')

    
@endsection
@section('sub_title2')

    
@endsection

@section('content')
<div class="row">

        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    @foreach($settings as $setting)
                    <form action="{{ url('update-settings') }}/{{ $setting->id }}  " method="post" enctype="multipart/form-data"
                        autocomplete="off">
                        {{ csrf_field() }}
                        {{-- 1 --}}
    
   <div class="mb-3">
        
    <label for="exampleInputEmail1" class="form-label">text:</label>
       <textarea type="text" name="settings_text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="">{{$setting->notification_setting_text}}</textarea>
       <input type="hidden" name="setting_id" value="{{$setting->id}}">
    <label class="my-1 mr-2" for="inlineFormCustomSelectPref">about-us:</label>
       <input type="text" name="about_us" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$setting->about_app}}">

    <label class="my-1 mr-2" for="inlineFormCustomSelectPref">email:</label>
       <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$setting->email}}">

    <label class="my-1 mr-2" for="inlineFormCustomSelectPref">phone:</label>
       <input type="phone" name="phone" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$setting->phone}}">      
                                       
    <label class="my-1 mr-2" for="inlineFormCustomSelectPref">face_link:</label>
       <input type="text" name="face_link" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$setting->fb_link}}">

    <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Tw_link:</label>
       <input type="text" name="Tw_link" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$setting->tw_link}}">                                                                    

    <label class="my-1 mr-2" for="inlineFormCustomSelectPref">insta_link:</label>
       <input type="text" name="insta_link" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$setting->insta_link}}">

    <label class="my-1 mr-2" for="inlineFormCustomSelectPref">whats_link:</label>
       <input type="text" name="whats_link" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$setting-> whats_link}}">

    <label class="my-1 mr-2" for="inlineFormCustomSelectPref">google_link:</label>
       <input type="text" name="google_link" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$setting->g_link}}">    
                        
                                    </div> 
  

             @endforeach
     <div class="modal-footer">
            <button class="btn ripple btn-primary" type="submit">update</button>
            <button class="btn ripple btn-secondary" data-dismiss="modal" type="button">Close</button>
          </div>

                    </form>
                 
                </div>
            </div>
        </div>
    </div>
    
@endsection

@section('scripts')

    
@endsection
