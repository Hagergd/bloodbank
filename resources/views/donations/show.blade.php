@extends('layouts.master')
@section('title')
bloodbank
    
@endsection
@section('css')

    
@endsection
@section('title1')

    Details
@endsection
@section('title2')
   donation requests
    
@endsection
@section('sub_title2')
    details
    
@endsection

@section('content')

    <div class="row row-sm">

        <div class="col-xl-12">
            <!-- div -->
            <div class="card mg-b-20" id="tabs-style2">
                <div class="card-body">
                    <div class="text-wrap">
                        <div class="example">
                            <div class="panel panel-primary tabs-style-2">
                                <div class=" tab-menu-heading">
                                    
                                </div>
                                <div class="panel-body tabs-menu-body main-content-body-right border">
                                    <div class="tab-content">


                                        <div class="tab-pane active" id="tab4">
                                            <div class="table-responsive mt-15">

                                                <table class="table table-striped" style="text-align:center">
                                                    <tbody>
                                                        
                                                        <tr>
                                                            <th scope="row">name</th>
                                                            <td>{{ $donations->patient_name }}</td>
                                                            <th scope="row">age</th>
                                                            <td>{{ $donations->patient_age }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">bags number</th>
                                                            <td>{{ $donations->bags_num}}</td>
                                                            <th scope="row">hospital</th>
                                                            <td>{{ $donations->hospital_name}}</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">adress</th>
                                                            <td>{{ $donations->hospital_address }}</td>
                                                        
                                                            <th scope="row">phone</th>
                                                            <td>{{ $donations->patient_phone }}</td>
                                                            
                                                            
                                                        </tr>
                                                          
                                                    </tbody>
                                                </table>

                                            </div>
                                        </div>

                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /div -->
        </div>

    </div>
@endsection

@section('scripts')

    
@endsection
