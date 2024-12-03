
@extends('/admin-mt/app')
@section('title')
Single Order-MT
@endsection
@section('admin-content')


            <!-- MAIN CONTENT-->
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6 offset-3">
                                <div class="card">
                                    <div class="card-header">
                                        <h3>Single Order</h3>
                                    </div>
                                    <div class="card-body">
                                        <h5>Freelancer Name: <span class="text-success">{{$frelancer->name}}</span></h5>
                                        <h5>Client Name: <span class="text-success">{{$client->name}}</span></h5>
                                        <h5>Amount: <span class="text-success">{{$single_order->orderprice}}</span></h5>
                                        <h5 >Place Order Date: <span class="text-success">{{$single_order->order_date}}</span></h5>
                                        <h5>Client Pay: <span class="text-success">{{$single_order->client_pay}}</span></h5>
                                        <h5>Status :@if($single_order->order_stutas ==0)
                                                <p class="btn btn-primary">Runing</p>
                                                @elseif($single_order->order_stutas ==1)
                                                    <p class="btn btn-success">Complete</p>
                                                @elseif($single_order->order_stutas ==2)
                                                    <p class="btn btn-danger">Cancle</p>
                                                @endif</h5>
                                        <h5>Ending Date And Time: <span class="text-success">{{$single_order->ending_order_date}}</span></h5>
                                         @if($single_order->order_stutas ==0)
                                                <a href="{{ url('/admin-mt-134/order/complete')}}/{{ $single_order->id }}" class="btn btn-primary">Complete</a>
                                                @elseif($single_order->order_stutas ==1)
                                                    <a href="{{ url('/admin-mt-134/order/back')}}/{{ $single_order->id }}" class="btn btn-warning">Back</a>
                                                @endif

                                                 @if($single_order->order_stutas ==0)

                                                <a href="{{ url('/admin-mt-134/order/cancle')}}/{{ $single_order->id }}" class="btn btn-warning">Cancle</a>
                                                @elseif($single_order->order_stutas ==2)
                                                <a href="{{ url('/admin-mt-134/order/delete')}}/{{ $single_order->id }}" class="btn btn-danger">Delete</a>
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