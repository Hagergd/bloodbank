@extends('layouts.master')
@section('title')

    bloodbank
@endsection
@section('css')
  <link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
  
    
@endsection
@section('title1')

    City
@endsection
@section('title2')
city
    
@endsection
@section('sub_title2')

    list of cities
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
                  <a class="btn ripple btn-primary" data-target="#modaldemo1" data-toggle="modal" href="cities/create">Add</a>
                  <i class="mdi mdi-dots-horizontal text-gray"></i>
                </div>
                
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table text-md-nowrap" id="example1">
                    <thead>
                      <tr>
                        <th class="wd-15p border-bottom-0">#</th>
                        <th class="wd-15p border-bottom-0"> City</th>
                        <th class="wd-15p border-bottom-0">Governorate</th>
                        <th class="wd-15p border-bottom-0">Edit</th>
                        <th class="wd-15p border-bottom-0">Delete</th>
                        
                      </tr>
                    </thead>
                    <tbody>

                         <?php $i=0;  ?>
                                             @foreach($cities as $city)

                                               <?php $i++;  ?>

                                             <tr>
                        <td>{{$i}}</td>
                        <td>{{$city->name}}</td>
                        <td>{{$city->governorate->name}}</td>
                        <td><a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale"
                                                       data-id="{{$city->id}}" data-city_name="{{$city->name}}" data-governorate_name="{{$city->governorate->name}}"
                                                      data-toggle="modal" href="#exampleModal2"
                                                       title="Edit"><i class="las la-pen"></i>Edit</a>
                        </td>
                        <td> <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
                                                       data-id="{{$city->id}}" data-city_name="{{$city->name}}" data-governorate_name="{{$city->governorate->name}}"
                                                        data-toggle="modal"
                                                       href="#modaldemo9" title="delete" ><i class="las la-trash"></i>Delete</a>
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
<div class="modal" id="modaldemo1">
      <div class="modal-dialog" role="document">
        <div class="modal-content modal-content-demo">
          <div class="modal-header">
            <h6 class="modal-title">add city</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
          </div>
          <div class="modal-body">
            <h6></h6>

   <form method="post" action="{{route('cities.store')}}">
                   @csrf
    <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">city</label>
    <input type="text" name="city_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                            <label class="my-1 mr-2" for="inlineFormCustomSelectPref">governorate</label>
                                        <select name="governorate" id="governorate_id" class="form-control" required>
                                            <option value="" selected disabled> --add--</option>
                                            @foreach ($governorates as $governorate)
                                                <option value="{{ $governorate->id }}">{{ $governorate->name }}</option>
                                            @endforeach
                                        </select>
                                    </div> 
  

  
     <div class="modal-footer">
            <button class="btn ripple btn-primary" type="submit">add</button>
            <button class="btn ripple btn-secondary" data-dismiss="modal" type="button">Close</button>
          </div>
    </form>

          </div>
      </div>
</div>
    <!-- End Basic modal -->
          <!--div-->
          
        </div>
<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                             aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Edit city</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">

                                        <form action="cities/update" method="post" autocomplete="off">
                                            {{method_field('patch')}}
                                            {{csrf_field()}}
                                            <div class="form-group">
                                                <input type="hidden" name="id" id="id" value="">
                                                <label for="recipient-name" class="col-form-label">city</label>
                                                <input class="form-control" name="city_name" id="city_id" type="text" value="">
                                                 <label class="my-1 mr-2" for="inlineFormCustomSelectPref">governorate</label>
                                        <select name="governorate" id="governorate_id" class="form-control" required>
                                            <option value="" selected disabled> ----</option>
                                            @foreach ($governorates as $governorate)
                                                <option value="{{ $governorate->id }}">{{ $governorate->name }}</option>
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
<div class="modal" id="modaldemo9">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">Delete city</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
            </div>
            <form action="cities/destroy" method="post">
                                    {{method_field('delete')}}
                                    {{csrf_field()}}
                                    <div class="modal-body">
                                        <p>Are you sure delete</p><br>
                                        <input type="hidden" name="id" id="id" value="">
                                        <input class="form-control" name="city_name" id="city_id" value="" type="text" readonly>
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
            var city_name = button.data('city_name')
            var governorate_name = button.data('governorate_name')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #city_id').val(city_name);
            modal.find('.modal-body #governorate_id').val(governorate_name);
           
        })
    </script>


     <script>
        $('#modaldemo9').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var city_name = button.data('city_name')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #city_id').val(city_name);
        })
    </script>
@endsection
