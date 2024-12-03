@extends('/client/client')
@section('title')
Home-MT
@endsection
@section('client-content')
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                                          
                                <div class="col-sm-3">
                                    <div class="card">
                                        <div class="card-header">
                                            <p>Saller Name:{{ $services->user->name }}</p>
                                        </div>
                                        <div class="card-body">
                                            <img width="30%" height="80px" src="{{url('public/images')}}/{{ $services->user->img }}" class="rounded-circle justify-content-center" alt="img">
                                            <p>{{$services->user->discription }}</p>
                                        </div>
                                        <div class="card-footer">
                                            <a href="{{url('inbox')}}/{{$services->user->id }}" class="btn btn-primary">Contact Me</a>
                                        </div>
                                    </div>
                                </div>                  
                                <div class="col-sm-9">
                                    <div class="banner">
                                        <img width="100%" src="{{url('public/images')}}/{{$services->img}}" alt="">
                                    </div><br>
                                    <div class="title">
                                        <h5>Rating: 5 <br>{{$services->title}}</h5>
                                    </div>
                                    <div class="pakage">
                                        <h4 class="text-success text-center">My Pakage</h4>
                                        <div class="row">
                                            <div class="col-sm-4">
                                              <h5>{{$services->first_title}}</h5>
                                              <p>{{$services->first_price}}</p>
                                              <a href="{{url('client/order/first/')}}/{{$services->id}}" class="btn btn-primary"> Order Now</a> 
                                            </div>
                                            <div class="col-sm-4">
                                              <h5>{{$services->second_title}}</h5>
                                              <p>{{$services->second_price}}</p>
                                              <a href="{{url('client/order/second/')}}/{{$services->id}}" class="btn btn-primary"> Order Now</a> 
                                            </div>
                                            <div class="col-sm-4">
                                              <h5>{{$services->third_title}}</h5>
                                              <p>{{$services->third_price}}</p>
                                              <a href="#" class="btn btn-primary"> Order Now</a> 
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="discription">
                                        <p>{{$services->discription}}</p>
                                        <a href="{{ url('client/order/custom/')}}/{{$services->id}}" class="btn btn-primary">Custom Order</a>
                                    </div>
                                    <div class="review">
                                        <h5 class="text-info">Mr Jon</h5>
                                        <p class="text-justify">Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto similique amet voluptatibus fugit, delectus soluta eos accusantium illum id rem totam reiciendis eius repudiandae nemo vitae error non officiis debitis at eaque sunt consequatur. Totam consequatur sequi aspernatur at, alias incidunt. Beatae, ipsam. Consectetur ab quod placeat, facilis corrupti consequuntur?</p>
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