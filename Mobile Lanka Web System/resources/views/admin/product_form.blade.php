@extends('layouts.app')

@section('content')
<h1>{{ isset($product) ? 'Edit Product' : 'Add Product' }}</h1>

<form method="POST" action="{{ isset($product) ? route('admin.updateProduct', $product->id) : route('admin.storeProduct') }}" enctype="multipart/form-data">
    @csrf
    @if(isset($product))
        @method('PUT')
    @endif

    <div>
        <label>Name:</label>
        <input type="text" name="name" value="{{ $product->name ?? '' }}" required>
    </div>
    <div>
        <label>Price:</label>
        <input type="number" name="price" step="0.01" value="{{ $product->price ?? '' }}" required>
    </div>
    <div>
        <label>Description:</label>
        <textarea name="description" required>{{ $product->description ?? '' }}</textarea>
    </div>
    <div>
        <label>Image:</label>
        <input type="file" name="image">
    </div>
    <button type="submit">{{ isset($product) ? 'Update' : 'Add' }}</button>
</form>
@endsection
