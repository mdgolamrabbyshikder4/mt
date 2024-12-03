 @extends('client/control/admin-mt/inc/app')
@section('title')
Order Page-MT
@endsection
@section('content')
 <!-- MAIN CONTENT-->
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6 offset-3">
                                <div class="card">
                                    <div class="card-header">
                                        <h3>Order Page</h3>
                                    </div>
                                    <div class="card-body">
                                        <h5>Freelancer Name: <span class="text-success">{{$frelancer->name}}</span></h5>
                                        <h5>Client Name: <span class="text-success">{{$client->name}}</span></h5>
                                        <h5>Amount: <span class="text-success">{{$single_order->orderprice}}</span></h5>
                                        <h5>You Will ger: <span class="text-success">{{$single_order->freelancer_pay}}</span></h5>
                                        <h5 >Place Order Date: <span class="text-success">{{$single_order->order_date}}</span></h5>
                                        <h5>Status :@if($single_order->order_stutas ==0)
                                                <p class="btn btn-primary">Runing</p>
                                                @elseif($single_order->order_stutas ==1)
                                                    <p class="btn btn-success">Complete</p>
                                                @elseif($single_order->order_stutas ==2)
                                                    <p class="btn btn-danger">Cancle</p>
                                                @elseif($single_order->order_stutas ==3 and $single_order->cansel_req =='c1')
                                                    <p class="btn btn-danger">Client Send Cancle Request</p>
                                                @elseif($single_order->order_stutas ==3 and $single_order->cansel_req =='f1')
                                                    <p class="btn btn-danger">Frelancer Send Cancle Request</p>
                                                @endif</h5>
                                        <h5>Ending Date And Time: <span class="text-success">{{$single_order->ending_order_date}}</span></h5>


                                         @if($single_order->order_stutas ==0)
                                         @if($single_order->frid == auth()->id())
                                                <a href="{{url('client/order/complete/reqiest/frellancer')}}/{{ $single_order->id }}" class="btn btn-primary">Complete Request</a>
                                                <a href="{{ url('/client/order/cancle/frelancer')}}/{{ $single_order->id }}" class="btn btn-warning">Cancle</a>
                                        @endif
                                        @endif

                                        @if($single_order->order_stutas ==3 and $single_order->cansel_req =='c1')
                                         @if($single_order->frid == auth()->id())
                                                <a href="{{ url('/client/order/cancle/fr/accept')}}/{{ $single_order->id }}" class="btn btn-warning">Cancle Request Accept</a>
                                                <a href="{{ url('/client/order/cancle/fr/reject')}}/{{ $single_order->id }}" class="btn btn-danger">Reject Cancle Request</a>
                                        @endif
                                        @endif

                                        @if($single_order->order_stutas ==3 and $single_order->cansel_req =='f1')
                                         @if($single_order->clid == auth()->id())
                                                <a href="{{ url('/client/order/cancle/cl/accept')}}/{{ $single_order->id }}" class="btn btn-warning">Cancle Request Accept</a>
                                                <a href="{{ url('/client/order/cancle/cl/reject')}}/{{ $single_order->id }}" class="btn btn-danger">Reject Cancle Request</a>
                                        @endif
                                        @endif

                                            @if(auth()->check())
                                            @if($single_order->clid == auth()->id())
                                            @if($single_order->accetp_req == 'f1' and $single_order->order_stutas ==7)
                                             <a href="{{ url('client/order/single/cl/complete/')}}/{{ $single_order->id }}" class="btn btn-primary">Accept</a>
                                             <a href="{{ url('/client/order/cancle/cl')}}/{{ $single_order->id }}" class="btn btn-warning"> Accept Request Cancle</a>
                                            @endif
                                            @endif

                                            @if($single_order->order_stutas ==1 or $single_order->order_stutas ==4)
                                            @if(date('Y-m-d', strtotime($single_order->ending_order_time.' +3 days')) > date('Y-m-d'))
                                            @if($single_order->order_stutas ==4)
                                                <a href="{{ url('/client/order/cancle/cl')}}/{{ $single_order->id }}" class="btn btn-warning">Again Cancle</a>
                                            @elseif($single_order->order_stutas ==1)
                                                <a href="{{ url('/client/order/cancle/cl')}}/{{ $single_order->id }}" class="btn btn-warning">Cancle</a>
                                            @endif
                                            @endif
                                            @endif

                                             @if($single_order->order_stutas ==3)
                                             <span class="btn btn-danger"> Cancle Request Panding</span>
                                            @endif
                                             @if($single_order->order_stutas ==4)
                                             <span class="btn btn-danger"> Cancle Request Reject</span>
                                            @endif
                                            @endif
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