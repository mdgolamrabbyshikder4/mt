@extends('client/control/admin-mt/inc/app')
@section('title')
Deposit Histry-MT
@endsection
@section('content')




                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <h3 class="text-success text-center">Deposit Histry</h3>
                            <div class="col-sm-12">
                                <table id="myTable" class="display">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Number</th>
                                            <th>Trid</th>
                                            <th>Amount</th>
                                            <th>Status</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       @foreach($deposit_histry as $deposit_histry)
                                        <tr>
                                            <td>{{$deposit_histry->id}}</td>
                                            <td>{{$deposit_histry->number}}</td>
                                            <td>{{$deposit_histry->trid}}</td>
                                            <td>{{$deposit_histry->amount}}</td>
                                            <td> @if($deposit_histry->status ==0)
                                                <p class="btn-primary btn">Pending</p>
                                                @elseif($deposit_histry->status ==1)
                                                    <p class="btn-success btn">Approve</p>
                                                    @elseif($deposit_histry->status ==2)
                                                    <p class="btn-danger btn">Reject</p>
                                                @endif
                                            </td>
                                            <td>{{$deposit_histry->dateandtime}}</td>
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