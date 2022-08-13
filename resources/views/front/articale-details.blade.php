@extends('front.layouts.master')
@section('title')
    blood bank
@endsection

@section('front-css')

@endsection

@section('contents')
   <!--inside-article-->
   <div class="article-details">
        <div class="inside-article">
            <div class="container">
                <div class="path">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">الرئيسية</a></li>
                            <li class="breadcrumb-item" aria-current="page"><a href="#">المقالات</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{$post->name}}</li>
                        </ol>
                    </nav>
                </div>
                <div class="article-image">
                    <img src="{{asset('front/imgs/'.$post->image)}}">
                </div>
                <div class="article-title col-12">
                    <div class="h-text col-6">
                        <h4>{{$post->name}}</h4>
                    </div>
                    <div class="icon col-6">
                        <button type="button"><i class="far fa-heart"></i></button>
                    </div>
                </div>
                
                <!--text-->
                <div class="text">
                    <p>
                        {{$post->content}}
                    </p> 
                    
                </div>
                
                <!--articles-->
                <div class="articles">
                    <div class="title">
                        <div class="head-text">
                            <h2>مقالات ذات صلة</h2>
                        </div>
                    </div>
                    <div class="view">
                <div class="container">
                    <div class="row">
                        <div class="owl-carousel articles-carousel">
                            @foreach($posts as $allpost)
                            <div class="card">
                                <div class="photo">
                                    <img src="{{asset('front/imgs/'.$allpost->image)}}" class="card-img-top" alt="...">
                                    <a href="{{url('post',$allpost->id)}}" class="click">المزيد</a>
                                </div>
                                <a href="#" class="favourite">
                                    <i class="far fa-heart"></i>
                                </a>

                                <div class="card-body">
                                    <h5 class="card-title">{{$allpost->name}}</h5>
                                    <p class="card-text">
                                        {{$allpost->content}}
                                    </p>
                                </div>
                            </div>
                            @endforeach
                        </div>
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