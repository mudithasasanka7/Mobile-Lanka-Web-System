<!-- resources/views/admin/edit_product.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="edit-product-container">
        <h2>Edit Product</h2>

        <form action="{{ url('/admin/products/' . $product->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div>
                <label for="name">Product Name:</label>
                <input type="text" name="name" id="name" value="{{ $product->name }}" required>
            </div>
            <div>
                <label for="description">Description:</label>
                <textarea name="description" id="description" required>{{ $product->description }}</textarea>
            </div>
            <div>
                <label for="price">Price:</label>
                <input type="number" name="price" id="price" value="{{ $product->price }}" required>
            </div>
            <button type="submit">Save Changes</button>
        </form>
    </div>
@endsection
