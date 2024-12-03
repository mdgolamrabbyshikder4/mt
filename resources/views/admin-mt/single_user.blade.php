
@extends('/admin-mt/app')
@section('title')
User-MT
@endsection
@section('admin-content')


            <!-- MAIN CONTENT-->
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6 offset-3">
                                <div class="card">
                                    <div class="card-header">
                                        <h3>{{$users->name}}</h3>
                                    </div>
                                    <div class="card-body">
                                        <img src="{{url('/public/client/img/')}}/{{$users->img}}" alt="Img">
                                        <img src="{{url('/public/client/img/')}}/{{$users->nid_img}}" alt="Img">
                                        <h5>Balance {{$users->balance}}</h5>
                                        <h5>Balance {{$users->location}}</h5>
                                        <h5>Balance {{$users->email}}</h5>
                                    </div>
                                    <div class="card-footer">
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END PAGE CONTAINER-->

    </div>

   @endsection