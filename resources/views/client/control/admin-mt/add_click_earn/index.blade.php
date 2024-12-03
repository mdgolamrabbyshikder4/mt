@extends('client/control/admin-mt/inc/app')
@section('title')
All Add Post-MT
@endsection
@section('content')
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
						<h3 class="text-center">Click & Earn Listings</h3>
					        <!-- Add New Button -->
						        <a href="{{ route('add_click_earn.create') }}" class="btn btn-primary mb-3">Add New Work</a>

						        <!-- DataTable -->
						        <table id="addClickEarnTable" class="table table-striped table-bordered">
						            <thead>
						                <tr>
						                    <th>ID</th>
						                    <th>Title</th>
						                    <th>Description</th>
						                    <th>Vacancy</th>
						                    <th>Price</th>
						                    <th>Work Approval</th>
						                    <th>Suspended</th>
						                    <th>Actions</th>
						                </tr>
						            </thead>
						            <tbody>
						                @foreach($click_earns as $click_earn)
						                    <tr>
						                        <td>{{ $click_earn->id }}</td>
						                        <td>{{ $click_earn->title }}</td>
						                        <td>{{ Str::limit($click_earn->description, 50) }}</td>
						                        <td>{{ $click_earn->work_vacancy }}</td>
						                        <td>{{ $click_earn->work_price }}</td>
						                        <td>{{ $click_earn->work_approval ? 'Approved' : 'Not Approved' }}</td>
						                        <td>{{ $click_earn->work_suspand ? 'Suspended' : 'Active' }}</td>
						                        <td>
						                            <a href="{{ route('add_click_earn.show', $click_earn->id) }}" class="btn btn-info btn-sm">View</a>
						                            <a href="{{ route('add_click_earn.edit', $click_earn->id) }}" class="btn btn-warning btn-sm">Edit</a>
						                            <form action="{{ route('add_click_earn.destroy', $click_earn->id) }}" method="POST" style="display:inline-block;">
						                                @csrf
						                                @method('DELETE')
						                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
						                            </form>
						                        </td>
						                    </tr>
						                @endforeach
						            </tbody>
						        </table>

                    </div>
                </div>
           
        <!-- END PAGE CONTAINER-->

@endsection

 