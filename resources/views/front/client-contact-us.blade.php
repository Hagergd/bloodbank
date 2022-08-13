@extends('front.layouts.master')
@section('title')

@endsection

@section('front-css')

@endsection

@section('contents')
<div class="contact-us">
    <div class="contact-now">
        @inject('client','App\Models\Client')
            <div class="container">
                <div class="path">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">الرئيسية</a></li>
                            <li class="breadcrumb-item active" aria-current="page">تواصل معنا</li>
                        </ol>
                    </nav>
                </div>
                <div class="row methods">
                    <div class="col-md-6">
                        <div class="call">
                            <div class="title">
                                <h4>اتصل بنا</h4>
                            </div>
                            <div class="content">
                                <div class="logo">
                                    <img src="{{asset('front/imgs/logo.png')}}">
                                </div>
                                <div class="details">
                                    <ul>
                                        <li><span>الجوال:</span> {{$settings->phone}}</li>
                                        <!-- <li><span>فاكس:</span> 234234234</li> -->
                                        <li><span>البريد الإلكترونى:</span> {{$settings->email}} </li>
                                    </ul>
                                </div>
                                <div class="social">
                                    <h4>تواصل معنا</h4>
                                    <div class="icons" dir="ltr">
                                        <div class="out-icon">
                                            <a href="{{$settings->fb_link}}"><img src="{{asset('front/imgs/001-facebook.svg')}}"></a>
                                        </div>
                                        <div class="out-icon">
                                            <a href=" {{$settings->tw_link}}"><img src="{{asset('front/imgs/002-twitter.svg')}}"></a>
                                        </div>
                                        <div class="out-icon">
                                            <a href=""><img src="{{asset('front/imgs/003-youtube.svg')}}"></a>
                                        </div>
                                        <div class="out-icon">
                                            <a href=" {{$settings->insta_link}}"><img src="{{asset('front/imgs/004-instagram.svg')}}"></a>
                                        </div>
                                        <div class="out-icon">
                                            <a href=" {{$settings->whats_link}}"><img src="{{asset('front/imgs/005-whatsapp.svg')}}"></a>
                                        </div>
                                        <div class="out-icon">
                                            <a href=" {{$settings->g_link}}"><img src="{{asset('front/imgs/006-google-plus.svg')}}"></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="contact-form">
                            <div class="title">
                                <h4>تواصل معنا</h4>
                            </div>
                            <div class="fields">
                                <form method="post" action="{{route('contacts.store')}}">
                                    {{ csrf_field() }}
                                     {{-- 1 --}}
                                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="الإسم" name="name">
                                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="البريد الإلكترونى" name="email">
                                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="الجوال" name="phone">
                                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="عنوان الرسالة" name="title">
                                    <textarea placeholder="نص الرسالة" class="form-control" id="exampleFormControlTextarea1" rows="3" name="text"></textarea>
                                    <input type="hidden" class="form-control" id="exampleFormControlInput1" placeholder="الإسم" name="id" value="{{$clients->id}}">
                                    <button type="submit">ارسال</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
@endsection

@section('script')

@endsection