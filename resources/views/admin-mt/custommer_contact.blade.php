
@extends('/admin-mt/app')
@section('title')
Admin Custommer Support Deposit-MT
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
                                            <th>Stutas</th>
                                            <th>Name</th>
                                            <th>Date</th>
                                            <th>Message</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($all_message as $all_message)        
                                        <tr>
                                            <td>{{ $all_message->id }}</td>
                                            
                                            <td>
                                                @if($all_message->status ==0)
                                                <p class="btn btn-primary">Runing</p>
                                                @elseif($all_message->status ==1)
                                                    <p class="btn btn-success">Complete</p>
                                                @elseif($all_message->status ==2)
                                                    <p class="btn btn-danger">Cancle</p>
                                                @endif
                                            </td>
                                            <td>{{ $all_message->user_id }}</td>
                                            <td>{{ $all_message->seen }}</td>

                                            <td>{{ $all_message->sanding_sate }}</td>
                                            <td>
                                                @if($all_message->status ==0)
                                                <a href="{{ url('/admin-mt-134/all_message/approval')}}/{{ $all_message->id }}" class="btn btn-primary">Complete</a>
                                                @else
                                                    <a href="{{ url('/admin-mt-134/all_message/back')}}/{{ $all_message->id }}" class="btn btn-warning">Back</a>
                                                @endif
                                                <a href="{{ url('/admin-mt-134/all_message/delete')}}/{{ $all_message->id }}" class="btn btn-danger">Delete</a>
                                                <a href="{{ url('/admin-mt-134/single_custommer_support/')}}/{{ $all_message->user_id }}" class="btn btn-info">View</a>
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
		<!-- Contact area end -->
           

@endsection