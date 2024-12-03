@extends('client/control/admin-mt/inc/app')
@section('title')
Service List
@endsection
@section('content')



                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <h3 class="text-success text-center">Service List</h3>
                            <div class="col-sm-12">
                                <table id="myTable" class="display">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Catagory</th>
                                            <th>Title</th>
                                            <th>Revew</th>
                                            <th>Image</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       @foreach($service_list as $service_list)
                                        <tr>
                                            <td>{{$service_list->id}}</td>
                                            <td>{{$service_list->catagory}}</td>
                                            <td>{{$service_list->title}}</td>
                                            <td>{{$service_list->review}}</td>
                                            <td> 
                                              <img class="service_img" src="{{url('/public/images')}}/{{$service_list->img}}" alt="img">
                                            </td>
                                            <td>
                                                <a href="{{url('/client/service/delete/')}}/{{$service_list->id}}" class="btn btn-danger">Delete</a>
                                                <a href="{{url('/client/service/edit/')}}/{{$service_list->id}}" class="btn btn-warning">Edit</a>
                                                <a href="{{url('/client/single/service')}}/{{$service_list->id}}" class="btn btn-primary">View</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END PAGE CONTAINER-->

    </div>

@endsection