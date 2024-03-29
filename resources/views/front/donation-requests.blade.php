@extends('front.layouts.master')
@section('title')

@endsection

@section('front-css')

@endsection

@section('contents')
    <div class="all-requests">
            <div class="container">
                <div class="path">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">الرئيسية</a></li>
                            <li class="breadcrumb-item active" aria-current="page">طلبات التبرع</li>
                        </ol>
                    </nav>
                </div>
            
                <!--requests-->
                <div class="requests">
                    <div class="head-text">
                        <h2>طلبات التبرع</h2>
                    </div>
                    <div class="content">
                        <form class="row filter" action="{{route('search-donation')}}" method="post">
                            {{ csrf_field() }}
                                     {{-- 1 --}}
                            <div class="col-md-5 blood">
                                <div class="form-group">
                                    <div class="inside-select">
                                        <select class="form-control" id="exampleFormControlSelect1" name="bloodtype">
                                            <option selected disabled>اختر فصيلة الدم</option>
                                            @foreach($bloodtypes as $bloodtype )
                                        <option value="{{$bloodtype->id}}">{{$bloodtype->name}}</option>

                                        @endforeach
                                            
                                        </select>
                                        <i class="fas fa-chevron-down"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5 city">
                                <div class="form-group">
                                    <div class="inside-select">
                                        <select class="form-control" id="exampleFormControlSelect1" name="city">
                                            <option selected disabled>اختر المدينة</option>
                                            @foreach($cities as $city )
                                        <option value="{{$city->id}}">{{$city->name}}</option>

                                        @endforeach
                                        </select>
                                        <i class="fas fa-chevron-down"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-1 search">
                                <button type="submit">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </form>
                        @foreach($donations as $donation)
                    <div class="patients">
                        
                        <div class="details">
                            <div class="blood-type">
                                <h2 dir="ltr">{{$donation->bloodType->name}}</h2>
                            </div>
                            <ul>
                                <li><span>اسم الحالة:</span>{{$donation->patient_name}} </li>
                                <li><span>مستشفى:</span>{{$donation->hospital_name}} </li>
                                <li><span>المدينة:</span> {{$donation->city->name}}</li>
                            </ul>
                            <a href="{{url('inside-request',$donation->id)}}">التفاصيل</a>
                        </div>
                        
                    </div>
                    
                    @endforeach
                        <div class="pages">
                            <nav aria-label="Page navigation example" dir="ltr">
                                <ul class="pagination">
                                    <li class="page-item">
                                        <a class="page-link" href="#" aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                        </a>
                                    </li>
                                    <li class="page-item"><a class="page-link active" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item"><a class="page-link" href="#">4</a></li>
                                    <li class="page-item"><a class="page-link" href="#">5</a></li>
                                    <li class="page-item"><a class="page-link" href="#">6</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#" aria-label="Next">
                                            <span aria-hidden="true">&raquo;</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection

@section('script')

@endsection