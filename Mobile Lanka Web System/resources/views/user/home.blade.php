@extends('layouts.app')

@section('content')
    <div class="home-container">
        <h1>Welcome to Mobile Lanka</h1>

        <!-- Filter Section -->
        <div class="filter-section">
            
            <select id="brandFilter" onchange="filterProducts()" style="padding: 5px; margin-bottom: 15px;">
                <option value="">Select Brand</option>
                @foreach ($products as $product)
                    <option value="{{ $product->brand }}">{{ $product->brand }}</option>
                @endforeach
            </select>
        </div>

        <!-- Grid Product List -->
        <div class="product-list" id="product-list">
            @foreach ($products as $product)
                <div class="product-item" data-brand="{{ $product->brand }}" data-name="{{ $product->name }}">
                    <img src="{{ asset('storage/' . $product->image) }}" alt="Product Image">
                    <h3>{{ $product->name }}</h3>
                    <p>{{ $product->description }}</p>
                    <a href="{{ route('product.details', $product->id) }}" class="view-details">View Details</a>
                </div>
            @endforeach
        </div>
    </div>

    <script>
        // Function to filter products based on search and brand
        function filterProducts() {
            const searchInput = document.getElementById('search').value.toLowerCase();
            const brandFilter = document.getElementById('brandFilter').value.toLowerCase();
            const productItems = document.querySelectorAll('.product-item');

            productItems.forEach(item => {
                const productName = item.getAttribute('data-name').toLowerCase();
                const productBrand = item.getAttribute('data-brand').toLowerCase();

                const matchesSearch = productName.includes(searchInput);
                const matchesBrand = brandFilter === '' || productBrand === brandFilter;

                if (matchesSearch && matchesBrand) {
                    item.style.display = 'block';  // Show the product item
                } else {
                    item.style.display = 'none';  // Hide the product item
                }
            });
        }
    </script>
@endsection
