@extends('layouts.app')

@section('content')
    <div style="
        max-width: 600px;
        margin: 2rem auto;
        padding: 2rem;
        font-family: Arial, sans-serif;
        background-color: #f9f9f9;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    ">
        <h1 style="
            text-align: center;
            color: #4CAF50;
            margin-bottom: 1.5rem;
        ">Add New Product</h1>

        <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data" style="
            display: flex;
            flex-direction: column;
            gap: 1rem;
        ">
            @csrf

            <!-- Product Name -->
            <div>
                <label for="name" style="font-weight: bold; margin-bottom: 0.5rem; display: block;">Product Name</label>
                <input type="text" name="name" id="name" required style="
                    width: 100%;
                    padding: 0.8rem;
                    border: 1px solid #ccc;
                    border-radius: 5px;
                    outline: none;
                    font-size: 1rem;
                ">
            </div>

            <!-- Price -->
            <div>
                <label for="price" style="font-weight: bold; margin-bottom: 0.5rem; display: block;">Price</label>
                <input type="number" name="price" id="price" required style="
                    width: 100%;
                    padding: 0.8rem;
                    border: 1px solid #ccc;
                    border-radius: 5px;
                    outline: none;
                    font-size: 1rem;
                ">
            </div>

            <!-- Description -->
            <div>
                <label for="description" style="font-weight: bold; margin-bottom: 0.5rem; display: block;">Description</label>
                <textarea name="description" id="description" required style="
                    width: 100%;
                    padding: 0.8rem;
                    border: 1px solid #ccc;
                    border-radius: 5px;
                    outline: none;
                    font-size: 1rem;
                    resize: none;
                " rows="4"></textarea>
            </div>

            <!-- Image -->
            <div>
                <label for="image" style="font-weight: bold; margin-bottom: 0.5rem; display: block;">Image</label>
                <input type="file" name="image" id="image" style="
                    width: 100%;
                    padding: 0.8rem;
                    border: 1px solid #ccc;
                    border-radius: 5px;
                    font-size: 1rem;
                ">
                <div id="image-preview" style="margin-top: 1rem; text-align: center;"></div>
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
                Save Product
            </button>
        </form>
    </div>

    <script>
        // Live Image Preview
        const imageInput = document.getElementById('image');
        const imagePreview = document.getElementById('image-preview');

        imageInput.addEventListener('change', function () {
            imagePreview.innerHTML = ""; // Clear any existing preview
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.style.width = '100px';
                    img.style.borderRadius = '5px';
                    img.style.boxShadow = '0 2px 4px rgba(0, 0, 0, 0.1)';
                    imagePreview.appendChild(img);
                };
                reader.readAsDataURL(file);
            }
        });
    </script>
@endsection
