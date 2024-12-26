<!-- resources/views/user/product_details.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="product-details-container">
        <h1>{{ $product->name }}</h1>
        <p>{{ $product->description }}</p>
        <p><strong>Price:</strong> ${{ $product->price }}</p>
        
        <!-- Display the product image if it exists -->
        @if($product->image)
            <div class="product-image">
                <img src="{{ asset('storage/' . $product->image) }}" alt="Product Image" width="300">
            </div>
        @else
            <p>No image available for this product.</p>
        @endif

        <button>Add to Cart</button>
    </div>
@endsection