@extends('/client/client')
@section('title')
{{ $partner->title }} - MT
@endsection
@section('client-content')
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                                          
                                <div class="col-sm-3">
                                    <div class="card">
                                        <div class="card-header">
                                            <p>Name:{{$wonne_info->name}}</p>
                                        </div>
                                        <div class="card-body">
                                            <img width="30%" height="80px" src="{{url('public/images')}}/{{$wonne_info->img}}" class="rounded-circle justify-content-center" alt="img">
                                            <p>{{$wonne_info->discription}}</p>
                                        </div>
                                        <div class="card-footer">
                                            <a href="{{url('inbox')}}/{{$wonne_info->id}}" class="btn btn-primary">Contact Me</a>
                                        </div>
                                    </div>
                                </div>                  
                                <div class="col-sm-9">          
                                <div class="card">
                                    <div class="card-header text-center bg-primary text-white">
                                        <h2>{{ $partner->title }}</h2>
                                    </div>
                                    <div class="card-body">
                                        <div class="text-center mb-3">
                                            <img src="{{ asset('storage/app/public/' . $partner->image) }}" alt="Partner Image" class="img-fluid rounded-circle" style="width: 150px; height: 150px;">
                                        </div>
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item"><strong>Age:</strong> {{ $partner->age }}</li>
                                            <li class="list-group-item"><strong>Profession:</strong> {{ $partner->profession }}</li>
                                            <li class="list-group-item"><strong>Marital Status:</strong> {{ $partner->marital_status }}</li>
                                            <li class="list-group-item"><strong>Contact Number:</strong> {{ $partner->contact_number }}</li>
                                        </ul>
                                        <div class="mt-3">
                                            <h5>Description:</h5>
                                            <p>{{ $partner->description }}</p>
                                        </div>
                                        <div class="mt-3 text-center">
                                            <a href="{{ asset('storage/app/public/' . $partner->bio_data) }}" class="btn btn-secondary">Download Bio Data</a>
                                        </div>
                                    </div>
                                    <div class="card-footer text-muted text-center">
                                        <small>Posted by: {{ $partner->user->name }} | {{ $partner->created_at->format('M d, Y') }}</small>
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