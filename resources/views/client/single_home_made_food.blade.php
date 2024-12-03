@extends('/client/client')
@section('title')
{{ $food->food_title }} - MT
@endsection
@section('client-content')
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                                          
                                <div class="col-sm-3">
                                    <div class="card">
                                        <div class="card-header">
                                            <p>Wonner Name:{{ $food->user->name }}</p>
                                        </div>
                                        <div class="card-body">
                                            <img width="30%" height="80px" src="{{url('public/images')}}/{{$food->user->img}}" class="rounded-circle justify-content-center" alt="img">
                                            <p>{{ $food->user->discription }}</p>
                                        </div>
                                        <div class="card-footer">
                                            <a href="{{url('inbox')}}/{{$food->user->id}}" class="btn btn-primary">Contact Me</a>
                                        </div>
                                    </div>
                                </div>                  
                                <div class="col-sm-9">          
                                    <div class="card">
                                        <img src="{{ asset('storage/app/public/' . $food->food_image) }}" class="card-img-top" alt="{{ $food->food_name }}">
                                        <div class="card-body">
                                            <h3 class="card-title">{{ $food->food_name }}</h3>
                                            <h5>{{ $food->food_title }}</h5>
                                            <p>{{ $food->food_description }}</p>
                                            <p><strong>Price:</strong> BDT: {{ $food->food_price }}</p>
                                            <p><strong>Delivery Cost:</strong> BDT:{{ $food->food_delivery_cost }}</p>
                                            <p><strong>Quantity Available:</strong> {{ $food->food_quantity }}</p>
                                            <p><strong>Location:</strong> {{ $food->food_location }}</p>
                                        </div>
                                        <div class="card-footer">
                                            <a href="{{ route('order.create', $food->id) }}" class="btn btn-success">Order Now</a>
                                        </div>
                                    </div>

                </div>
            </div>
        </div>
        <!-- END PAGE CONTAINER-->

    </div>

@endsection