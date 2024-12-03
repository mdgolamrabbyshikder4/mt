@extends('client/control/admin-mt/inc/app')
@section('title')
Add Partner Post-MT
@endsection
@section('content')
<div class="section__content section__content--p30">
    <div class="container-fluid">
        <h2>Add New Food Item</h2>

    <form action="{{ route('home-made-food-sell.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="food_name">Food Name</label>
            <input type="text" name="food_name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="food_title">Food Title</label>
            <input type="text" name="food_title" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="food_description">Description</label>
            <textarea name="food_description" class="form-control" rows="3" required></textarea>
        </div>
        <div class="form-group">
            <label for="food_price">Price</label>
            <input type="number" name="food_price" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="food_delivery_cost">Delivery Cost</label>
            <input type="number" name="food_delivery_cost" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="food_quantity">Quantity</label>
            <input type="number" name="food_quantity" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="food_location">Location</label>
            <input type="text" name="food_location" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="food_image">Food Image</label>
            <input type="file" name="food_image" class="form-control-file">
        </div>

        <button type="submit" class="btn btn-primary mt-3">Save</button>
    </form>
    </div>
</div>
@endsection
