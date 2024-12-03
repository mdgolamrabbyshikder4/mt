@extends('client/control/admin-mt/inc/app')
@section('title')
{{ $homeMadeFoodSell->food_name }} & {{ $homeMadeFoodSell->title }}-MT
@endsection
@section('content')
<div class="section__content section__content--p30">
    <div class="container-fluid">
    <h2>Food Item Details</h2>
        <a href="{{ route('home-made-food-sell.index') }}" class="btn btn-secondary mb-3">Back to List</a>

        <div class="card">
            <div class="card-header">
                {{ $homeMadeFoodSell->food_title }}
            </div>
            <div class="card-body">
                <h5 class="card-title">Food Name: {{ $homeMadeFoodSell->food_name }}</h5>
                <p class="card-text"><strong>Description:</strong> {{ $homeMadeFoodSell->food_description }}</p>
                <p class="card-text"><strong>Price:</strong> ${{ $homeMadeFoodSell->food_price }}</p>
                <p class="card-text"><strong>Delivery Cost:</strong> ${{ $homeMadeFoodSell->food_delivery_cost }}</p>
                <p class="card-text"><strong>Quantity:</strong> {{ $homeMadeFoodSell->food_quantity }}</p>
                <p class="card-text"><strong>Location:</strong> {{ $homeMadeFoodSell->food_location }}</p>
                <p class="card-text">
                    <strong>Status:</strong>
                    @if($homeMadeFoodSell->food_approve_type == 1)
                        <span class="badge bg-success">Approved</span>
                    @else
                        <span class="badge bg-danger">Suspended</span>
                    @endif
                </p>

                @if($homeMadeFoodSell->food_image)
                    <div class="mb-3">
                        <strong>Food Image:</strong>
                        <img src="{{ asset('storage/app/public/' . $homeMadeFoodSell->food_image) }}" alt="Food Image" class="img-fluid" width="200">
                    </div>
                @else
                    <p>No image available.</p>
                @endif

                <a href="{{ route('home-made-food-sell.edit', $homeMadeFoodSell->id) }}" class="btn btn-warning">Edit</a>

                <form action="{{ route('home-made-food-sell.destroy', $homeMadeFoodSell->id) }}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
