@extends('layouts.app')

@section('content')
    <div style="
        font-family: Arial, sans-serif;
        padding: 2rem;
        background-color: #f9f9f9;
    ">
        <h1 style="
            text-align: center;
            color: #4CAF50;
            margin-bottom: 1.5rem;
        ">Product List</h1>

        <div style="
            text-align: right;
            margin-bottom: 1rem;
        ">
            <a href="{{ route('admin.products.create') }}" style="
                text-decoration: none;
                background-color: #4CAF50;
                color: white;
                padding: 0.5rem 1rem;
                border-radius: 5px;
                font-size: 1rem;
                transition: background-color 0.3s ease;
            " onmouseover="this.style.backgroundColor='#45a049'" onmouseout="this.style.backgroundColor='#4CAF50'">
                Add New Product
            </a>
        </div>

        <table style="
            width: 100%;
            border-collapse: collapse;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        ">
            <thead>
                <tr style="
                    background-color: #4CAF50;
                    color: white;
                ">
                    <th style="padding: 1rem; text-align: left;">Name</th>
                    <th style="padding: 1rem; text-align: left;">Price</th>
                    <th style="padding: 1rem; text-align: left;">Description</th>
                    <th style="padding: 1rem; text-align: left;">Image</th>
                    <th style="padding: 1rem; text-align: left;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                    <tr style="
                        background-color: #ffffff;
                        transition: background-color 0.3s ease;
                    " onmouseover="this.style.backgroundColor='#f1f1f1'" onmouseout="this.style.backgroundColor='#ffffff'">
                        <td style="padding: 1rem;">{{ $product->name }}</td>
                        <td style="padding: 1rem;">${{ $product->price }}</td>
                        <td style="padding: 1rem;">{{ $product->description }}</td>
                        <td style="padding: 1rem;">
                            <img src="{{ asset('storage/' . $product->image) }}" alt="Product Image" style="
                                width: 50px;
                                height: auto;
                                border-radius: 5px;
                                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
                            ">
                        </td>
                        <td style="padding: 1rem;">
                            <a href="{{ route('admin.products.edit', $product->id) }}" style="
                                text-decoration: none;
                                color: #4CAF50;
                                font-weight: bold;
                            " onmouseover="this.style.color='#45a049'" onmouseout="this.style.color='#4CAF50'">
                                Edit
                            </a>
                            |
                            <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" style="
                                display: inline;
                            " onsubmit="return confirmDelete()">
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="
                                    background-color: #f44336;
                                    color: white;
                                    border: none;
                                    padding: 0.5rem 1rem;
                                    border-radius: 5px;
                                    cursor: pointer;
                                    font-size: 0.9rem;
                                    transition: background-color 0.3s ease;
                                " onmouseover="this.style.backgroundColor='#e53935'" onmouseout="this.style.backgroundColor='#f44336'">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script>
        // Confirmation dialog for delete action
        function confirmDelete() {
            return confirm('Are you sure you want to delete this product?');
        }
    </script>
@endsection
