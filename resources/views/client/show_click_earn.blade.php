@extends('/client/client')
@section('title')
{{ $clickEarn->title }} - MT
@endsection
@section('client-content')
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                                          
                                <div class="col-sm-3">
                                    <div class="card">
                                        <div class="card-header">
                                            <p>Wonner Name:{{ $clickEarn->user->name }}</p>
                                        </div>
                                        <div class="card-body">
                                            <img width="30%" height="80px" src="{{url('public/images')}}/{{$clickEarn->user->img}}" class="rounded-circle justify-content-center" alt="img">
                                            <p>{{ $clickEarn->user->discription }}</p>
                                        </div>
                                        <div class="card-footer">
                                            <a href="{{url('inbox')}}/{{$clickEarn->user->id}}" class="btn btn-primary">Contact Me</a>
                                        </div>
                                    </div>
                                </div>                  
                                <div class="col-sm-9">          
                                <div class="card">
                                    @if ($clickEarn->work_img)
                                        <img src="{{ asset('storage/app/public/' . $clickEarn->work_img) }}" class="card-img-top" alt="{{ $clickEarn->title }}">
                                    @else
                                        <img src="{{ url('public/images/default.jpg') }}" class="card-img-top" alt="{{ $clickEarn->title }}">
                                    @endif
                                    <div class="card-body">
                                        <h3 class="card-title">{{ $clickEarn->title }}</h3>
                                        <p><strong>Description:</strong> {{ $clickEarn->description }}</p>
                                        <p><strong>Vacancies:</strong> {{ $clickEarn->work_vacancy }}</p>
                                        <p><strong>Price per Click:</strong> BDT:{{ $clickEarn->work_price }}</p>
                                        <p><strong>Job Link:</strong> <a href="{{ $clickEarn->work_link }}" target="_blank">{{ $clickEarn->work_link }}</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END PAGE CONTAINER-->

                </div>

@endsection