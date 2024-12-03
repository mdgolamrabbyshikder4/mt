@extends('client/control/admin-mt/inc/app')
@section('title')
Edit Partner Post-MT
@endsection
@section('content')
<div class="section__content section__content--p30">
    <div class="container-fluid">
        <h2>Edit Food Item</h2>

        <form action="{{ route('home-made-food-sell.update', $homeMadeFoodSell->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="food_name">Food Name</label>
                <input type="text" name="food_name" class="form-control" value="{{ $homeMadeFoodSell->food_name }}" required>
            </div>
            <div class="form-group">
                <label for="food_title">Food Title</label>
                <input type="text" name="food_title" class="form-control" value="{{ $homeMadeFoodSell->food_title }}" required>
            </div>
            <div class="form-group">
                <label for="food_description">Description</label>
                <textarea name="food_description" class="form-control" rows="3" required>{{ $homeMadeFoodSell->food_description }}</textarea>
            </div>
            <div class="form-group">
                <label for="food_price">Price</label>
                <input type="number" name="food_price" class="form-control" value="{{ $homeMadeFoodSell->food_price }}" required>
            </div>
            <div class="form-group">
                <label for="food_delivery_cost">Delivery Cost</label>
                <input type="number" name="food_delivery_cost" class="form-control" value="{{ $homeMadeFoodSell->food_delivery_cost }}" required>
            </div>
            <div class="form-group">
                <label for="food_quantity">Quantity</label>
                <input type="number" name="food_quantity" class="form-control" value="{{ $homeMadeFoodSell->food_quantity }}" required>
            </div>
            <div class="form-group">
                <label for="food_location">Location</label>
                <input type="text" name="food_location" class="form-control" value="{{ $homeMadeFoodSell->food_location }}" required>
            </div>
            <div class="form-group">
                <label for="food_image">Food Image</label>
                <input type="file" name="food_image" class="form-control-file">
                @if($homeMadeFoodSell->food_image)
                    <img src="{{ asset('storage/app/public/' . $homeMadeFoodSell->food_image) }}" alt="Food Image" width="100">
                @endif
            </div>

            <button type="submit" class="btn btn-primary mt-3">Update</button>
        </form>
    </div>
</div>
@endsection
