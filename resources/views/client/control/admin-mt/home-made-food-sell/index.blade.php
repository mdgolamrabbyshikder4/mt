@extends('client/control/admin-mt/inc/app')
@section('title')
 Home Made Food Listings Post-MT
@endsection
@section('content')
                <div class="section__content section__content--p30">
                    <div class="container-fluid">

						 <h2>Home Made Food Listings</h2>
						    <a href="{{ route('home-made-food-sell.create') }}" class="btn btn-primary mb-3">Add New Food Item</a>

						    <table id="foodTable" class="display table table-striped table-bordered" style="width:100%">
						        <thead>
						            <tr>
						                <th>ID</th>
						                <th>Food Name</th>
						                <th>Food Title</th>
						                <th>Price</th>
						                <th>Delivery Cost</th>
						                <th>Quantity</th>
						                <th>Approval Status</th>
						                <th>Image</th>
						                <th>Action</th>
						            </tr>
						        </thead>
						        <tbody>
						            @foreach($foods as $food)
						                <tr>
						                    <td>{{ $food->id }}</td>
						                    <td>{{ $food->food_name }}</td>
						                    <td>{{ $food->food_title }}</td>
						                    <td>{{ $food->food_price }}</td>
						                    <td>{{ $food->food_delivery_cost }}</td>
						                    <td>{{ $food->food_quantity }}</td>
						                    <td>
						                        @if($food->food_approve_type == 1)
						                            <span class="badge bg-success">Approved</span>
						                        @else
						                            <span class="badge bg-danger">Suspended</span>
						                        @endif
						                    </td>
						                    <td>
						                        @if($food->food_image)
						                            <img src="{{ asset('storage/app/public/' . $food->food_image) }}" alt="Food Image" width="50">
						                        @else
						                            No image
						                        @endif
						                    </td>
						                    <td>
						                    	 <a href="{{ route('home-made-food-sell.show', $food->id) }}" class="btn btn-info btn-sm">View</a>
						                        <a href="{{ route('home-made-food-sell.edit', $food->id) }}" class="btn btn-warning btn-sm">Edit</a>
						                        <form action="{{ route('home-made-food-sell.destroy', $food->id) }}" method="POST" style="display:inline;">
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
                </div>
            </div>
        <!-- END PAGE CONTAINER-->

    </div>
@endsection
