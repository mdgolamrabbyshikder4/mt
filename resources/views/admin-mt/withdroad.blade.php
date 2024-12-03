
@extends('/admin-mt/app')
@section('title')
Withdroad-MT
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
                                            <th>Admin Number</th>
                                            <th>Client Number</th>
                                            <th>Amount</th>
                                            <th>Date And Time</th>
                                            <th>Transaction Id</th>
                                            <th>Stutas</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($withdroad as $withdroad)        
                                        <tr>
                                            <td>{{ $withdroad->id }}</td>
                                            <td>{{ $withdroad->sendernumber }}</td>
                                            <td>{{ $withdroad->number }}</td>
                                            <td>{{ $withdroad->amount }}</td>
                                            <td>{{ $withdroad->dateandtime }}</td>
                                            <td>{{ $withdroad->trid }}</td>
                                            <td>
                                                @if($withdroad->status ==0)
                                                <p>Pending</p>
                                                @else
                                                    <p>Complete</p>
                                                @endif
                                            </td>
                                            <td>
                                                @if($withdroad->status ==0)
                                                <a href="{{ url('/admin-mt-134/withdroad/approval')}}/{{ $withdroad->id }}" class="btn btn-primary">Aprove</a>
                                                @else
                                                    <a href="{{ url('/admin-mt-134/withdroad/back')}}/{{ $withdroad->id }}" class="btn btn-warning">Back</a>
                                                @endif
                                                <a href="{{ url('/admin-mt-134/withdroad/delete')}}/{{ $withdroad->id }}" class="btn btn-danger">Delete</a>
                                                <a href="{{ url('/admin-mt-134/withdroad/edit')}}/{{ $withdroad->id }}" class="btn btn-success">Edit</a>
                                                <a href="{{ url('/admin-mt-134/withdroad/view')}}/{{ $withdroad->id }}" class="btn btn-info">View</a>
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