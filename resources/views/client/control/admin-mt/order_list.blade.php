
@extends('client/control/admin-mt/inc/app')
@section('title')
Order Page-MT
@endsection
@section('content')


            <!-- MAIN CONTENT-->
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="myTable" class="display">
                                    
                                   user id {{$globalData['user_id']}}
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Stutas</th>
                                            <th>Amount</th>
                                            <th>Perces Date</th>
                                            <th>Complete Date</th>
                                            <th>Clinet Pay</th>
                                            <th>Freelancer Get</th>
                                            <th>Admin Profit</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach($shear_order_list as $order)        
                                        <tr>
                                            <td>{{ $order->id }}</td>
                                            
                                            <td>
                                                @if($order->status ==0)
                                                <p class="btn btn-primary">Runing</p>
                                                @elseif($order->status ==1)
                                                    <p class="btn btn-success">Complete</p>
                                                @elseif($order->status ==2)
                                                    <p class="btn btn-danger">Cancle</p>
                                                @endif
                                            </td>
                                            <td>{{ $order->orderprice }}</td>
                                            <td>{{ $order->order_date }}</td>

                                            <td>{{ $order->ending_order_date }}</td>
                                            <td>{{ $order->client_pay }}</td>
                                            <td>{{ $order->freelancer_pay }}</td>
                                            <td>{{ $order->adminprofit }}</td>
                                            <td>
                                                @if($order->status ==0)
                                                <a href="{{ url('/admin-mt-134/order/approval')}}/{{ $order->id }}" class="btn btn-primary">Complete</a>
                                                @else
                                                    <a href="{{ url('/admin-mt-134/order/back')}}/{{ $order->id }}" class="btn btn-warning">Back</a>
                                                @endif
                                                <!-- <a href="{{ url('/admin-mt-134/order/delete')}}/{{ $order->id }}" class="btn btn-danger">Delete</a> -->
                                                <a href="{{ url('/client/order/single')}}/{{ $order->id }}" class="btn btn-info">View</a>
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