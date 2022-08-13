@extends('layouts.master')
@section('title')

    bloodbank
@endsection
@section('css')
<link href="{{ URL::asset('assets/plugins/fileuploads/css/fileupload.css') }}" rel="stylesheet" type="text/css" />
    <!---Internal Fancy uploader css-->
    <link href="{{ URL::asset('assets/plugins/fancyuploder/fancy_fileupload.css') }}" rel="stylesheet" />
    
@endsection
@section('title1')
     Add user
    
@endsection
@section('title2')

    users
@endsection
@section('sub_title2')
   Add user
    
@endsection

@section('content')

     <div class="bg-light p-4 rounded">
        <h1>Show user</h1>
        <div class="lead">
            
        </div>
        
        <div class="container mt-4">
            <div>
                Name: {{ $user->name }}
            </div>
            <div>
                Email: {{ $user->email }}
            </div>
            <div>
                Username: {{ $user->username }}
            </div>
        </div>

    </div>
    <div class="mt-4">
        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-info">Edit</a>
        <a href="{{ route('users.index') }}" class="btn btn-default">Back</a>
    </div>
@endsection

@section('scripts')

    
@endsection
