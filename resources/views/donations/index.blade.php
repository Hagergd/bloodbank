@extends('layouts.master')
@section('title')

    bloodbank
@endsection
@section('css')
  <link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
  
    
@endsection
@section('title1')

    Donation Requests
@endsection
@section('title2')

    donatios
@endsection
@section('sub_title2')

    list of requests
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
                        <th class="wd-15p border-bottom-0">Hospital</th>
                        <th class="wd-15p border-bottom-0">City</th>
                        <th class="wd-15p border-bottom-0">Show</th>

                        <th class="wd-15p border-bottom-0">Delete</th>

                        
                      </tr>
                    </thead>
                    <tbody>

                    <?php $i=0;  ?>

                    @foreach($donations as $donation)

                     <?php $i++;  ?>

                     <tr>
                        <td>{{$i}}</td>
                        <td>{{$donation->patient_name}}</td>
                        <td>{{$donation->hospital_name}}</td>
                        <td>{{$donation->city->name}}</td>
                        <td> <a class=" btn  btn-info btn-sm" href="{{ url('donation-details') }}/{{ $donation->id }}" data-id="{{ $donation->id }}" data-donation_name="{{ $donation->patient_name }}"><i class="text-danger fas fa"></i>Show</a>
                        </td>
                        <td> <a class="modal-effect btn  btn-danger btn-sm" href="#" data-id="{{ $donation->id }}" data-donation_name="{{ $donation->patient_name }}"
                                                            data-toggle="modal" data-target="#delete_donation"><i
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


            </div>            <!-- delete -->
<div class="modal" id="delete_donation">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">Delete Donation</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
            </div>
            <form action="donatios/destroy" method="post">
                                    {{method_field('delete')}}
                                    {{csrf_field()}}
                                    <div class="modal-body">
                                        <p>Are you sure delete</p><br>
                                        <input type="hidden" name="id" id="id" value="">
                                        <input class="form-control" name="donation_name" id="donation_id" value="" type="text" readonly>
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
        $('#delete_donation').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var donation_name = button.data('donation_name')
           var modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #donation_id').val(donation_name);
        })
    </script>
@endsection
