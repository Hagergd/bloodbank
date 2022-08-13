@extends('layouts.master')
@section('title')

    bloodbank
@endsection
@section('css')
  <link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
  
    
@endsection
@section('title1')

    Posts
@endsection
@section('title2')

    post
@endsection
@section('sub_title2')

    list of posts
@endsection

@section('content')
@if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


   @if(session()->has('add'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('add') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

   @if(session()->has('edit'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('edit') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

     @if(session()->has('delete'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('delete') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif



        <div class="row row-sm">
          <div class="col-xl-12">
            <div class="card">
              <div class="card-header pb-0">
                <div class="d-flex justify-content-between">
                  <a class="btn ripple btn-primary"  href="posts/create">Add</a>
                  <i class="mdi mdi-dots-horizontal text-gray"></i>
                </div>
                
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table text-md-nowrap" id="example1">
                    <thead>
                      <tr>
                        <th class="wd-15p border-bottom-0">#</th>
                        <th class="wd-15p border-bottom-0"> Name</th>
                        <th class="wd-15p border-bottom-0">Category</th>
                        <th class="wd-15p border-bottom-0">Image</th>
                        <th class="wd-15p border-bottom-0">Content</th>
                        <th class="wd-15p border-bottom-0">Edit</th>
                        <th class="wd-15p border-bottom-0">Delete</th>
                        
                      </tr>
                    </thead>
                    <tbody>

                         <?php $i=0;  ?>
                                             @foreach($posts as $post)

                                               <?php $i++;  ?>

                                             <tr>
                        <td>{{$i}}</td>
                        <td>{{$post->name}}</td>

                        <td>{{$post->category->name}}</td>
                        <td>{{$post->image}}</td>
                        <td>{{$post->content}}</td>

                        

                        <td><a href="{{ url('edit') }}/{{ $post->id }}"
                                                    class="btn  btn-primary btn-sm"
                                                    type="button">Edit<i class="fas fa" ></i></a>
                        </td>
                        <td> <a class="modal-effect btn  btn-danger btn-sm" href="#" data-id="{{ $post->id }}" data-post_name="{{ $post->name }}"
                                                            data-toggle="modal" data-target="#delete_post"><i
                                                                class="text-danger fas fa"></i>Delete</a>
                        </td>
                        
                      </tr>

                                              @endforeach

                      
                      
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <!--/div-->

    <!-- End Basic modal -->
          <!--div-->
          
        </div>
<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                             aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Edit post</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">

                                        <form action="posts/update" method="post" autocomplete="off">
                                            {{method_field('patch')}}
                                            {{csrf_field()}}
                                            <div class="form-group">
                                                <input type="hidden" name="id" id="id" value="">
                                                <label for="recipient-name" class="col-form-label">post</label>
                                                <input class="form-control" name="city_name" id="city_id" type="text" value="">
                                                 <label class="my-1 mr-2" for="inlineFormCustomSelectPref">category</label>
                                        <select name="category" id="category_id" class="form-control" required>
                                            <option value="" selected disabled> ----</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                     
                                                
                                            </div>
                                          
                                    
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">ok</button>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">close</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
</div>

            </div>            <!-- delete -->
<div class="modal" id="delete_post">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">Delete post</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
            </div>
            <form action="posts/destroy" method="post">
                                    {{method_field('delete')}}
                                    {{csrf_field()}}
                                    <div class="modal-body">
                                        <p>Are you sure delete</p><br>
                                        <input type="hidden" name="id" id="id" value="">
                                        <input class="form-control" name="post_name" id="post_id" value="" type="text" readonly>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">cancel</button>
                                        <button type="submit" class="btn btn-danger">ok</button>
                                    </div>
            </div>
                </form>
                            
        
    </div>
</div>

        <!-- /row -->
      </div>

      <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection

    


@section('scripts')

    <script>
        $('#exampleModal2').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var post_name = button.data('post_name')
            var category_name = button.data('category_name')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #post_id').val(post_name);
            modal.find('.modal-body #category_id').val(category_name);
           
        })
    </script>


     <script>
        $('#delete_post').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var post_name = button.data('post_name')
           var modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #post_id').val(post_name);
        })
    </script>
@endsection
