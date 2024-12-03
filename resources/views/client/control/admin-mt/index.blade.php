@extends('client/control/admin-mt/inc/app')
@section('title')
Dashbord-MT
@endsection
@section('content')




                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">

                                @foreach($services as $services)
                                <div class="col-sm-3">
                                    <a href="{{url('client/single/service')}}/{{$services->id}}">
                                    <div class="banner" style="display: block;">
                                        <img width="100%" src="{{url('public/images')}}/{{$services->img}}" alt="">
                                    </div><br>
                                    <div class="title">
                                        <h5>{{$services->title}}</h5>
                                    </div>
                                    </a>
                                </div>
                                @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END PAGE CONTAINER-->

    </div>

@endsection