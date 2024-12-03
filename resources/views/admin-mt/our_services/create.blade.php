
@extends('/admin-mt/app')
@section('title')
Our-All-Service-MT
@endsection
@section('admin-content')
            <!-- MAIN CONTENT-->
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-12">
                            <h3 class="text-center text-success" >Create New Service</h3>
                                <form action="{{ route('our_services.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <!-- Title Input -->
                                    <div class="form-group mb-3">
                                        <label for="title">Title</label>
                                        <input type="text" name="title" class="form-control" required>
                                    </div>

                                    <!-- Description Input -->
                                    <div class="form-group mb-3">
                                        <label for="description">Description</label>
                                        <textarea name="description" class="form-control" rows="4" required></textarea>
                                    </div>

                                    <!-- Price Input -->
                                    <div class="form-group mb-3">
                                        <label for="price">Price</label>
                                        <input type="number" step="0.01" name="price" class="form-control" required>
                                    </div>

                                    <!-- Processing Time Input -->
                                    <div class="form-group mb-3">
                                        <label for="processing_time">Processing Time (in days)</label>
                                        <input type="number" name="processing_time" class="form-control" required>
                                    </div>

                                    <!-- Coupon Code Input -->
                                    <div class="form-group mb-3">
                                        <label for="cupon_code">Coupon Code</label>
                                        <input type="text" name="cupon_code" class="form-control">
                                    </div>

                                    <!-- Coupon Discount Input -->
                                    <div class="form-group mb-3">
                                        <label for="cupon_discount">Coupon Discount (%)</label>
                                        <input type="number" step="0.01" name="cupon_discount" class="form-control" value="0">
                                    </div>

                                    <!-- Demo Link Input -->
                                    <div class="form-group mb-3">
                                        <label for="demo_link">Demo Link</label>
                                        <input type="url" name="demo_link" class="form-control">
                                    </div>

                                    <!-- Image Input -->
                                    <div class="form-group mb-3">
                                        <label for="image">Image</label>
                                        <input type="file" name="image" class="form-control">
                                    </div>

                                    <!-- Submit Button -->
                                    <button type="submit" class="btn btn-primary">Create Service</button>
                                    <a href="{{ route('our_services.index') }}" class="btn btn-secondary">Cancel</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END PAGE CONTAINER-->

    </div>

   @endsection