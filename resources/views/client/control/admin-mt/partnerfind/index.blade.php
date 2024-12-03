@extends('client/control/admin-mt/inc/app')
@section('title')
Find Pratner Post-MT
@endsection
@section('content')




                <div class="section__content section__content--p30">
                    <div class="container-fluid">
					    <h3 class="text-success text-center">Find Partners</h3>

					    <!-- Add Partner Button -->
					    <div class="text-right" style="margin-bottom: 20px;">
					        <a href="{{ route('find_partner.create') }}" class="btn btn-success">Add New Partner</a>
					    </div>

					    <!-- Partners Table -->
					    <table id="find-partners-table" class="table table-striped table-bordered">
					        <thead>
					            <tr>
					                <th>ID</th>
					                <th>Name</th>
					                <th>Age</th>
					                <th>Profession</th>
					                <th>Marital Status</th>
					                <th>Actions</th> <!-- Actions column -->
					            </tr>
					        </thead>
					        <tbody>
					            @foreach($partners as $partner)
					                <tr>
					                    <td>{{ $partner->id }}</td>
					                    <td>{{ $partner->name }}</td>
					                    <td>{{ $partner->age }}</td>
					                    <td>{{ $partner->profession }}</td>
					                    <td>{{ $partner->marital_status }}</td>
					                    <td>
					                        <!-- Action buttons -->
					                        <a href="{{ route('find_partner.show', $partner->id) }}" class="btn btn-info btn-sm">View</a>
					                        <a href="{{ route('find_partner.edit', $partner->id) }}" class="btn btn-warning btn-sm">Edit</a>
					                        <form action="{{ route('find_partner.destroy', $partner->id) }}" method="POST" style="display:inline;">
					                            @csrf
					                            @method('DELETE')
					                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
					                        </form>
					                        <form action="{{ route('find_partner.married', $partner->id) }}" method="POST" style="display:inline;">
					                            @csrf
					                            <button type="submit" class="btn btn-success btn-sm">Mark as Married</button>
					                        </form>
					                        <form action="{{ route('find_partner.unmarried', $partner->id) }}" method="POST" style="display:inline;">
					                            @csrf
					                            <button type="submit" class="btn btn-secondary btn-sm">Mark as Unmarried</button>
					                        </form>
					                    </td>
					                </tr>
					            @endforeach
					        </tbody>
					    </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- END PAGE CONTAINER-->

    </div>
@endsection
