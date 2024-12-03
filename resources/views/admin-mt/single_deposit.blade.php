
@extends('/admin-mt/app')
@section('title')
Single Deposit-MT
@endsection
@section('admin-content')


            <!-- MAIN CONTENT-->
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6 offset-3">
                                <div class="card">
                                    <div class="card-header">
                                        <h3>Number:-<span class="text-success">{{$deposit->number}}</span></h3>
                                    </div>
                                    <div class="card-body">
                                        <h5>Amount: <span class="text-success">{{$deposit->amount}}</span></h5>
                                        <h5 >Transaction Id: <span class="text-success">{{$deposit->trid}}</span></h5>
                                        <h5>Type: <span class="text-success">{{$deposit->methods}}</span></h5>
                                        <h5>Stutas:  @if($deposit->status ==0)
                                                <span class="text-success">Pending</span>
                                                @else
                                                <span class="text-success">Approve</span>
                                                @endif</h5>
                                        <h5>User Id: <span class="text-success">{{$deposit->user_id}}</span></h5>
                                        <h5>Date And Time: <span class="text-success">{{$deposit->dateandtime}}</span></h5>
                                         @if($deposit->status ==0)
                                                <a href="{{ url('/admin-mt-134/deposit/approval')}}/{{ $deposit->id }}" class="btn btn-primary">Aprove</a>
                                                @else
                                                    <a href="{{ url('/admin-mt-134/deposit/back')}}/{{ $deposit->id }}" class="btn btn-warning">Back</a>
                                                @endif
                                                <a href="{{ url('/admin-mt-134/deposit/delete')}}/{{ $deposit->id }}" class="btn btn-danger">Delete</a>
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