@extends('/client/client')
@section('title')
{{ $product->title }} - MT
@endsection
@section('client-content')
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                                          
                                <div class="col-sm-3">
                                    <div class="card">
                                        <div class="card-header">
                                            <p>Wonner Name:{{$product->user->name}}</p>
                                        </div>
                                        <div class="card-body">
                                            <img width="30%" height="80px" src="{{url('public/images')}}/{{$product->user->img}}" class="rounded-circle justify-content-center" alt="img">
                                            <p>{{$product->user->->discription}}</p>
                                        </div>
                                        <div class="card-footer">
                                            <a href="{{url('inbox')}}/{{$product->user->->id}}" class="btn btn-primary">Contact Me</a>
                                        </div>
                                    </div>
                                </div>                  
                                <div class="col-sm-9">          
                            <!-- Product Details -->
                            <div class="card mb-4">
                                <div class="card-header">
                                    <h3>{{ $product->product_name }}</h3>
                                </div>
                                <div class="card-body">
                                    <img src="{{ asset('storage/app/public/' . $product->image) }}" alt="{{ $product->title }}" class="img-fluid mb-3">
                                    <h5 class="card-title">{{ $product->title }}</h5>
                                    <p class="card-text">{{ $product->description }}</p>
                                    <p><strong>Price:</strong> ${{ $product->price }}</p>
                                    <p><strong>Contact Info:</strong> {{ $product->contact_info }}</p>
                                    <p><strong>Location:</strong> {{ $product->location }}</p>
                                    <p><strong>Tags:</strong> {{ $product->tag }}</p>
                                    <p><strong>Sales Status:</strong> {{ $product->sales_type == 1 ? 'Sold' : 'Available' }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <!-- END PAGE CONTAINER-->

    </div>

@endsection