@extends('client/control/admin-mt/inc/app')
@section('title')
Edit Product-MT
@endsection
@section('content')
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
			            <div class="row">
			                <div class="col-lg-12">
			                    <h3 class="text-success text-center">Edit Product</h3>

			                    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
			                        @csrf
			                        @method('PUT') <!-- This is important for the update request -->

			                        <div class="form-group">
			                            <label for="product_name">Product Name:</label>
			                            <input type="text" name="product_name" class="form-control" value="{{ $product->product_name }}" required>
			                        </div>

			                        <div class="form-group">
			                            <label for="title">Title:</label>
			                            <input type="text" name="title" class="form-control" value="{{ $product->title }}" required>
			                        </div>

			                        <div class="form-group">
			                            <label for="description">Description:</label>
			                            <textarea name="description" class="form-control" rows="5" required>{{ $product->description }}</textarea>
			                        </div>

			                        <div class="form-group">
			                            <label for="price">Price:</label>
			                            <input type="number" name="price" class="form-control" value="{{ $product->price }}" required>
			                        </div>

			                        <div class="form-group">
			                            <label for="contact_info">Contact Info:</label>
			                            <input type="text" name="contact_info" class="form-control" value="{{ $product->contact_info }}" required>
			                        </div>

			                        <div class="form-group">
			                            <label for="location">Location:</label>
			                            <input type="text" name="location" class="form-control" value="{{ $product->location }}" required>
			                        </div>

			                        <div class="form-group">
			                            <label for="tag">Tag:</label>
			                            <input type="text" name="tag" class="form-control" value="{{ $product->tag }}" required>
			                        </div>

			                        <div class="form-group">
			                            <label for="category_id">Category:</label>
			                            <select name="category_id" class="form-control" required>
			                                <option value="">Select Category</option>
			                                @foreach($categories as $category)
			                                    <option value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
			                                @endforeach
			                            </select>
			                        </div>

			                        <div class="form-group">
			                            <label for="image">Product Image:</label>
			                            <input type="file" name="image" id="product_image" class="form-control">
			                            @if($product->image)
			                                <img id="product_show_image" src="{{ asset('storage/app/public/' . $product->image) }}" alt="{{ $product->product_name }}" style="width: 100px; margin-top: 10px;">
			                            @endif
			                        </div>

			                        <div class="form-group">
			                            <button type="submit" class="btn btn-primary">Update Product</button>
			                            <a href="{{ route('products.index') }}" class="btn btn-secondary">Back</a>
			                        </div>
			                    </form>
			                </div>
			            </div>
            </div>
        </div>
        <!-- END PAGE CONTAINER-->

    </div>

@endsection