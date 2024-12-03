@extends('client/control/admin-mt/inc/app')
@section('title')
{{ $product->product_name }}-MT
@endsection
@section('content')
			<div class="section__content section__content--p30">
			    <div class="container-fluid">
					<div class="container">
					    <h2 class="text-center">{{ $product->product_name }}</h2>
					    
					    <div class="row">
					        <!-- Product Image -->
					        <div class="col-md-6">
					            <img src="{{ asset('storage/app/public/' . $product->image) }}" class="img-responsive" alt="{{ $product->product_name }}" style="max-width: 100%;">
					        </div>

					        <!-- Product Details -->
					        <div class="col-md-6">
					            <h4>Title: {{ $product->title }}</h4>
					            <p><strong>Description:</strong> {{ $product->description }}</p>
					            <p><strong>Price:</strong> ${{ number_format($product->price, 2) }}</p>
					            <p><strong>Contact Info:</strong> {{ $product->contact_info }}</p>
					            <p><strong>Location:</strong> {{ $product->location }}</p>

					            <!-- Conditional Sales Status -->
					            @if($product->sales_type == 1)
					                <p><strong>Status:</strong> Sold</p>
					            @else
					                <p><strong>Status:</strong> Available</p>
					            @endif

					            <!-- Back to Products Button -->
					            <a href="{{ route('products.index') }}" class="btn btn-primary">Back to Products</a>
					        </div>
					    </div>
					</div>

			    </div>
			</div>

@endsection