@extends('client/control/admin-mt/inc/app')
@section('title')
Create Job Post-MT
@endsection
@section('content')




                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <h3 class="text-success text-center">Add Product</h3>
							<div class="col-sm-12">
							    <div class="container">
							        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
							            @csrf
							            
							            <!-- Product Name -->
							            <div class="form-group">
							                <label for="product_name" class="col-sm-2 control-label">Product Name</label>
							                <div class="col-sm-10">
							                    <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Product Name" required>
							                </div>
							            </div>

							            <!-- Title -->
							            <div class="form-group">
							                <label for="title" class="col-sm-2 control-label">Title</label>
							                <div class="col-sm-10">
							                    <input type="text" class="form-control" id="title" name="title" placeholder="Title" required>
							                </div>
							            </div>

							            <!-- Description -->
							            <div class="form-group">
							                <label for="description" class="col-sm-2 control-label">Description</label>
							                <div class="col-sm-10">
							                    <textarea class="form-control" id="description" name="description" placeholder="Description" rows="4" required></textarea>
							                </div>
							            </div>

							            <!-- Price -->
							            <div class="form-group">
							                <label for="price" class="col-sm-2 control-label">Price</label>
							                <div class="col-sm-10">
							                    <input type="text" class="form-control" id="price" name="price" placeholder="Price" required>
							                </div>
							            </div>

							            <!-- Tag -->
							            <div class="form-group">
							                <label for="tag" class="col-sm-2 control-label">Tag</label>
							                <div class="col-sm-10">
							                    <input type="text" class="form-control" id="tag" name="tag" placeholder="Tag" required>
							                </div>
							            </div>

							            <!-- Location -->
							            <div class="form-group">
							                <label for="location" class="col-sm-2 control-label">Location</label>
							                <div class="col-sm-10">
							                    <input type="text" class="form-control" id="location" name="location" placeholder="Location" required>
							                </div>
							            </div>

							            <!-- Category -->
							            <div class="form-group">
							                <label for="category_id" class="col-sm-2 control-label">Category</label>
							                <div class="col-sm-10">
							                    <select class="form-control" id="category_id" name="category_id" required>
							                        <option value="">Select Category</option>
							                        @foreach($categories as $category)
							                            <option value="{{ $category->id }}">{{ $category->name }}</option>
							                        @endforeach
							                    </select>
							                </div>
							            </div>

							            <!-- Contact Info -->
							            <div class="form-group">
							                <label for="contact_info" class="col-sm-2 control-label">Contact Info</label>
							                <div class="col-sm-10">
							                    <input type="text" class="form-control" id="contact_info" name="contact_info" placeholder="Contact Info" required>
							                </div>
							            </div>

							             <!-- Image -->
							            <div class="form-group">
							                <label for="product_image" class="col-sm-2 control-label">Product Image</label>
							                <div class="col-sm-10">
							                	<img id="product_show_image" src="" alt="Product Image Preview" class="img-thumbnail" style="max-height: 150px; margin-top: 10px; display: none;">
							                    <input type="file" class="form-control" id="product_image" name="image">
							                    
							                </div>
							            </div>

							            <!-- Submit Button -->
							            <div class="form-group">
							                <div class="col-sm-offset-2 col-sm-10">
							                    <button type="submit" class="btn btn-primary">Add Product</button>
							                </div>
							            </div>
							        </form>
							    </div>
							</div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END PAGE CONTAINER-->

    </div>

@endsection