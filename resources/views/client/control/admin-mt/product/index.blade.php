@extends('client/control/admin-mt/inc/app')
@section('title')
Product List-MT
@endsection
@section('content')

			<div class="section__content section__content--p30">
			    <div class="container-fluid">
			        <div class="row">
			            <h3 class="text-success text-center">All Products</h3>

			            <!-- Add Product Button -->
			            <div class="text-right" style="margin-bottom: 20px; margin-left: 30px;">
			                <a href="{{ route('products.create') }}" class="btn btn-success">Add New Product</a>
			            </div>
			        </div>

			        <div class="container">

			            <table id="product-table" class="display" style="width:100%">
			                <thead>
			                    <tr>
			                        <th>ID</th>
			                        <th>Image</th>
			                        <th>Product Name</th>
			                        <th>Price</th>
			                        <th>Stock</th>
			                        <th>Actions</th> <!-- Add Actions column -->
			                    </tr>
			                </thead>
			                <tbody>
			                    @foreach($products as $product)
			                    <tr>
			                        <td>{{ $product->id }}</td>
			                        <td><img src="{{ asset('storage/app/public/' . $product->image) }}" style="width:50px; height:50px;"></td>
			                        <td>{{ $product->product_name }}</td>
			                        <td>${{ number_format($product->price, 2) }}</td>
			                        <td>
			                        	 @if($product->sales_type ==0)
			                            In Stock
										@elseif($product->sales_type ==1)
			                           Sales
										@endif
			                        </td>
			                        <td>
			                            <!-- Action buttons -->
			                            <a href="{{ route('products.show', $product->id) }}" class="btn btn-info btn-sm">View</a>
			                            @if($product->sales_type ==0)
			                              <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning btn-sm">Edit</a>
			                            <form action="{{ route('products.markAsSold', $product->id) }}" method="POST" style="display:inline;">
										    @csrf
										    <button type="submit" class="btn btn-success btn-sm" onclick="return confirm('Are you sure you want to mark this product as sold?')">Mark as Sold</button>
										</form>
										@elseif($product->sales_type ==1)
			                            <form action="{{ route('products.markAsInstock', $product->id) }}" method="POST" style="display:inline;">
										    @csrf
										    <button type="submit" class="btn btn-success btn-sm" onclick="return confirm('Are you sure you want to mark this product as sold?')">Mark In Stock</button>
										</form>
										@endif
			                            <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
			                                @csrf
			                                @method('DELETE')
			                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
			                            </form>
			                        </td>
			                    </tr>
			                    @endforeach
			                </tbody>
			            </table>
			        </div>
			    </div>
			</div>

			<script type="text/javascript">
			$(document).ready(function() {
			    // Initialize DataTable
			    $('#product-table').DataTable();
			});
			</script>

@endsection