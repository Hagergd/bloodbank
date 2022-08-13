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
        <h1>{{ ucfirst($role->name) }} Role</h1>
        <div class="lead">
            
        </div>
        
        <div class="container mt-4">

            <h3>Assigned permissions</h3>

            <table class="table table-striped">
                <thead>
                    <th scope="col" width="20%">Name</th>
                    <th scope="col" width="1%">Guard</th> 
                </thead>

                @foreach($rolePermissions as $permission)
                    <tr>
                        <td>{{ $permission->name }}</td>
                        <td>{{ $permission->guard_name }}</td>
                    </tr>
                @endforeach
            </table>
        </div>

    </div>
    <div class="mt-4">
        <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-info">Edit</a>
        <a href="{{ route('roles.index') }}" class="btn btn-default">Back</a>
    </div>
@endsection

@section('scripts')

    
@endsection
