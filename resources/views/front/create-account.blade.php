@extends('front.layouts.master')
@section('title')
     blood bank
@endsection

@section('front-css')
       
@endsection

@section('contents')
<div class="create">
      <div class="form">
            <div class="container">
                <div class="path">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">الرئيسية</a></li>
                            <li class="breadcrumb-item active" aria-current="page">انشاء حساب جديد</li>
                        </ol>
                    </nav>
                </div>
                <div class="account-form">
                    <form action="{{url('api/v1/register')}}" method="post">
                                    {{ csrf_field() }}
                                     {{-- 1 --}}
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="الإسم" name="name">
                        
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="البريد الإلكترونى" name="email">
                        
                        <input placeholder="تاريخ الميلاد" class="form-control" type="text" onfocus="(this.type='date')" id="date" name="d_o_b">
                        

                        <select class="form-control" id="bloodtype" name="blood_type_id" placeholder="اختر المحافظة ">
                            <option>اختر  الفصية </option>
                            @foreach($bloodtypes as $bloodtype )
                            <option value="{{$bloodtype->id}}" >{{$bloodtype->name}}</option>
                            @endforeach
                        </select>
                        
                        <select class="form-control" id="governorates" name="governorates" placeholder="اختر المحافظة ">
                            <option>اختر الحافظة </option>
                            @foreach($governorates as $governorate )
                            <option value="{{$governorate->id}}" >{{$governorate->name}}</option>
                            @endforeach
                        </select>
                        
                        <select class="form-control" id="cities" name="city_id" placeholder="اختر المدينة ">
                            
                            
                        </select>
                        
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="رقم الهاتف" name="phone">
                        
                        <input placeholder="آخر تاريخ تبرع" class="form-control" type="text" onfocus="(this.type='date')" id="date" name="last_donation_date">
                        
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="كلمة المرور" name="password">
                        
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="تأكيد كلمة المرور" >
                        
                        <div class="create-btn">
                            <input type="submit" value="إنشاء"></input>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>

    $("governorates").change(function(e){
        e.preventDefault();
    
    var governorate_id =$("governorates").val();

    if ($governorate_id ) {
        // console.log('governorate_id')

     $.ajax({
         url : '{{url('api/v1/cities?governorate_id=')}}'+governorate_id, 

         type : 'get',


         success:function(data){
            
            if (data.status == 1)
             {

              $("#cities").empty();
              $("#cities").append('<option  value="">اختر المدينة </option>');

              $.each(data.data,function (index,city) {

                $("#cities").append('<option  value="'+city.id+'">'+city.name+'</option>');
                  
              });

            }
            
         },

     });

    }else{

       $("#cities").empty();
       $("#cities").append('<option  value="">اختر المدينة </option>');

    }


});

</script>

@endsection