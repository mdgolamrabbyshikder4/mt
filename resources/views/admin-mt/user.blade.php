
@extends('/admin-mt/app')
@section('title')
User-MT
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
                                            <th>Name</th>
                                            <th>Balance</th>
                                            <th>Order</th>
                                            <th>img</th>
                                            <th>NID No</th>
                                            <th>Aproval</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($users as $user)        
                                        <tr>
                                            <td>{{ $user->id }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->calance }}</td>
                                            <td>{{ $user->ordar_no }}</td>
                                            <td><img src="{{url('/public/admin')}}images/{{$user->img}}" alt=""></td>
                                            <td>{{ $user->ordar_no }}</td>
                                            <td>
                                                @if($user->approval ==0)
                                                <p>Unapprove</p>
                                                @else
                                                    <p>Approve</p>
                                                @endif
                                            </td>
                                            <td>
                                                @if($user->approval ==0)
                                                <a href="{{ url('/admin-mt-134/user/approval')}}/{{ $user->id }}" class="btn btn-primary">Aprove</a>
                                                @else
                                                    <a href="{{ url('/admin-mt-134/user/suspend')}}/{{ $user->id }}" class="btn btn-warning">Suspend</a>
                                                @endif
                                                <a href="{{ url('/admin-mt-134/user/delete')}}/{{ $user->id }}" class="btn btn-danger">Delete</a>
                                                <a href="#" class="btn btn-success">Edit</a>
                                                <a href="{{ url('/admin-mt-134/user/view')}}/{{ $user->id }}" class="btn btn-info">View</a>
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