@extends('layouts.app')

@section('content')
    <div class="admin-dashboard" style="
        padding: 2rem;
        font-family: Arial, sans-serif;
        background-color: #f4f4f9;
        color: #333;
    ">
        <h1 style="
            text-align: center;
            color: #4CAF50;
            font-size: 2.5rem;
            margin-bottom: 1.5rem;
        ">Welcome Admin</h1>
        <p style="
            text-align: center;
            font-size: 1.2rem;
            margin-bottom: 2rem;
        ">You can manage mobile phones from here:</p>

        <ul style="
            display: flex;
            justify-content: center;
            gap: 1.5rem;
            list-style: none;
            padding: 0;
        ">
            <li style="
                padding: 1rem 2rem;
                background-color: #4CAF50;
                color: white;
                border-radius: 8px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                transition: transform 0.3s ease, box-shadow 0.3s ease;
                cursor: pointer;
                font-size: 1.1rem;
                text-align: center;
            " onmouseover="hoverEffect(this)" onmouseout="resetEffect(this)">
                <a href="#" style="
                    text-decoration: none;
                    color: white;
                    font-weight: bold;
                ">Add Product</a>
            </li>
            <li style="
                padding: 1rem 2rem;
                background-color: #4CAF50;
                color: white;
                border-radius: 8px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                transition: transform 0.3s ease, box-shadow 0.3s ease;
                cursor: pointer;
                font-size: 1.1rem;
                text-align: center;
            " onmouseover="hoverEffect(this)" onmouseout="resetEffect(this)">
                <a href="{{ route('admin.products.index') }}" style="
                    text-decoration: none;
                    color: white;
                    font-weight: bold;
                ">Manage Products</a>
            </li>
            <li style="
                padding: 1rem 2rem;
                background-color: #4CAF50;
                color: white;
                border-radius: 8px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                transition: transform 0.3s ease, box-shadow 0.3s ease;
                cursor: pointer;
                font-size: 1.1rem;
                text-align: center;
            " onmouseover="hoverEffect(this)" onmouseout="resetEffect(this)">
                <a href="#" style="
                    text-decoration: none;
                    color: white;
                    font-weight: bold;
                ">View Products</a>
            </li>
        </ul>
    </div>

    <script>
        // JavaScript for hover effects
        function hoverEffect(element) {
            element.style.transform = 'scale(1.05)';
            element.style.boxShadow = '0 6px 12px rgba(0, 0, 0, 0.2)';
        }

        function resetEffect(element) {
            element.style.transform = 'scale(1)';
            element.style.boxShadow = '0 4px 8px rgba(0, 0, 0, 0.1)';
        }
    </script>
@endsection
