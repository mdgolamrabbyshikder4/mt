@extends('client/control/admin-mt/inc/app')
@section('title')
Withdroad Histry-MT
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
                                       @foreach($withdroad_histry as $withdroad_histry)
                                        <tr>
                                            <td>{{$withdroad_histry->id}}</td>
                                            <td>{{$withdroad_histry->number}}</td>
                                            <td>{{$withdroad_histry->trid}}</td>
                                            <td>{{$withdroad_histry->amount}}</td>
                                            <td> @if($withdroad_histry->status ==0)
                                                <p class="btn-primary btn">Pending</p>
                                                @elseif($withdroad_histry->status ==1)
                                                    <p class="btn-success btn">Sender Number:{{$withdroad_histry->sendernumber}}</p>
                                                    @elseif($withdroad_histry->status ==2)
                                                    <p class="btn-danger btn">Reject</p>
                                                @endif
                                            </td>
                                            <td>{{$withdroad_histry->dateandtime}}</td>
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