
@extends('/admin-mt/app')
@section('title')
Deposit-MT
@endsection
@section('admin-content')


            <!-- MAIN CONTENT-->
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="myTable" class="display">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Number</th>
                                            <th>Amount</th>
                                            <th>Date And Time</th>
                                            <th>Transaction Id</th>
                                            <th>Stutas</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($deposit as $deposit)        
                                        <tr>
                                            <td>{{ $deposit->id }}</td>
                                            <td>{{ $deposit->number }}</td>
                                            <td>{{ $deposit->amount }}</td>
                                            <td>{{ $deposit->dateandtime }}</td>
                                            <td>{{ $deposit->trid }}</td>
                                            <td>
                                                @if($deposit->status ==0)
                                                <p>Pending</p>
                                                @else
                                                    <p>Approve</p>
                                                @endif
                                            </td>
                                            <td>
                                                @if($deposit->status ==0)
                                                <a href="{{ url('/admin-mt-134/deposit/approval')}}/{{ $deposit->id }}" class="btn btn-primary">Aprove</a>
                                                @else
                                                    <a href="{{ url('/admin-mt-134/deposit/back')}}/{{ $deposit->id }}" class="btn btn-warning">Back</a>
                                                @endif
                                                <a href="{{ url('/admin-mt-134/deposit/delete')}}/{{ $deposit->id }}" class="btn btn-danger">Delete</a>
                                                <a href="#" class="btn btn-success">Edit</a>
                                                <a href="{{ url('/admin-mt-134/deposit/view')}}/{{ $deposit->id }}" class="btn btn-info">View</a>
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