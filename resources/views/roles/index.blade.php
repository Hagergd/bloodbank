@extends('layouts.master')
@section('title')

    bloodbank
@endsection
@section('css')
  <link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
  
    
@endsection
@section('title1')

    Users
@endsection
@section('title2')

    user
@endsection
@section('sub_title2')

    list of users
@endsection

@section('content')

        

    <div class="bg-light p-4 rounded">
        <h1>Roles</h1>
        <div class="lead">
            Manage your roles here.
            <a href="{{ route('roles.create') }}" class="btn btn-primary btn-sm float-right">Add role</a>
        </div>
        
        <div class="mt-2">
            @include('layouts.messages')
        </div>

        <table class="table table-bordered">
          <tr>
             <th width="1%">No</th>
             <th>Name</th>
             <th width="3%" colspan="3">Action</th>
          </tr>
            @foreach ($roles as $key => $role)
            <tr>
                <td>{{ $role->id }}</td>
                <td>{{ $role->name }}</td>
                <td>
                    <a class="btn btn-info btn-sm" href="{{ route('roles.show', $role->id) }}">Show</a>
                </td>
                <td>
                    <a class="btn btn-primary btn-sm" href="{{ route('roles.edit', $role->id) }}">Edit</a>
                </td>
                <td>
                    {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
            @endforeach
        </table>

        <div class="d-flex">
            {!! $roles->links() !!}
        </div>

    </div>
@endsection

    


@section('scripts')

    <script>
        $('#exampleModal2').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var user_name = button.data('user_name')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #user_id').val(user_name);
            
        })
    </script>


     <script>
        $('#delete_user').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var user_name = button.data('user_name')
           var modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #user_id').val(user_name);
        })
    </script>
@endsection
