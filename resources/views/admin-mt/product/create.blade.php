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
                                    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <input type="text" name="product_name" placeholder="Product Name" required>
                                        <input type="text" name="title" placeholder="Title" required>
                                        <textarea name="description" placeholder="Description" required></textarea>
                                        <img id="product_show_image" src="" alt="">
                                        <input type="file" id="product_image" name="image">
                                        <input type="text" name="price" placeholder="Price" required>
                                        <input type="text" name="contact_info" placeholder="Contact Info" required>
                                        <input type="text" name="tag" placeholder="tag" required>
                                        <select name="category_id" required>
                                            <option value="">Select Category</option>
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                        <input type="text" name="location" placeholder="Location" required>
                                        <button type="submit">Add Product</button>
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
