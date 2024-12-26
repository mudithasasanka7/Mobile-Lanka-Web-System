@extends('layouts.app')

@section('content')
    <div style="
        font-family: Arial, sans-serif;
        max-width: 600px;
        margin: 2rem auto;
        padding: 2rem;
        background-color: #f9f9f9;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    ">
        <h2 style="
            text-align: center;
            color: #4CAF50;
            margin-bottom: 1.5rem;
        ">Edit Product</h2>

        <form action="{{ route('admin.products.update', $product) }}" method="POST" enctype="multipart/form-data" style="
            display: flex;
            flex-direction: column;
            gap: 1rem;
        ">
            @csrf
            @method('PUT')

            <!-- Name Field -->
            <div style="display: flex; flex-direction: column;">
                <label for="name" style="margin-bottom: 0.5rem; font-weight: bold;">Name:</label>
                <input type="text" name="name" value="{{ $product->name }}" required style="
                    padding: 0.8rem;
                    border: 1px solid #ccc;
                    border-radius: 5px;
                    outline: none;
                    font-size: 1rem;
                ">
            </div>

            <!-- Price Field -->
            <div style="display: flex; flex-direction: column;">
                <label for="price" style="margin-bottom: 0.5rem; font-weight: bold;">Price:</label>
                <input type="number" name="price" value="{{ $product->price }}" required style="
                    padding: 0.8rem;
                    border: 1px solid #ccc;
                    border-radius: 5px;
                    outline: none;
                    font-size: 1rem;
                ">
            </div>

            <!-- Description Field -->
            <div style="display: flex; flex-direction: column;">
                <label for="description" style="margin-bottom: 0.5rem; font-weight: bold;">Description:</label>
                <textarea name="description" style="
                    padding: 0.8rem;
                    border: 1px solid #ccc;
                    border-radius: 5px;
                    outline: none;
                    font-size: 1rem;
                    resize: none;
                " rows="4">{{ $product->description }}</textarea>
            </div>

            <!-- Image Upload Field -->
            <div style="display: flex; flex-direction: column;">
                <label for="image" style="margin-bottom: 0.5rem; font-weight: bold;">Image:</label>
                <input type="file" name="image" style="
                    padding: 0.8rem;
                    border: 1px solid #ccc;
                    border-radius: 5px;
                    font-size: 1rem;
                ">
                @if($product->image)
                    <div style="margin-top: 1rem;">
                        <img src="{{ asset('storage/' . $product->image) }}" alt="Product Image" style="
                            width: 100px;
                            height: auto;
                            border-radius: 5px;
                            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
                        ">
                    </div>
                @endif
            </div>

            <!-- Submit Button -->
            <button type="submit" style="
                background-color: #4CAF50;
                color: white;
                padding: 0.8rem;
                font-size: 1rem;
                font-weight: bold;
                border: none;
                border-radius: 5px;
                cursor: pointer;
                transition: background-color 0.3s ease;
            " onmouseover="this.style.backgroundColor='#45a049'" onmouseout="this.style.backgroundColor='#4CAF50'">
                Update Product
            </button>
        </form>
    </div>

    <script>
        // Optional: Add interactivity, such as a preview for the uploaded image
        const imageInput = document.querySelector('input[name="image"]');
        const imgPreview = document.querySelector('img[alt="Product Image"]');

        if (imageInput && imgPreview) {
            imageInput.addEventListener('change', function () {
                const file = this.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function (e) {
                        imgPreview.src = e.target.result;
                    };
                    reader.readAsDataURL(file);
                }
            });
        }
    </script>
@endsection
