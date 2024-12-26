<?php

namespace App\Http\Controllers;
use App\Models\Product;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Show all products in admin dashboard
    public function index()
    {
        {
        $products = Product::all(); // Fetch all products from the database
        return view('admin.products.index', compact('products')); // Pass products to the view
    }
    }

    // Show the form to create a new product
    public function create()
    {
        return view('admin.products.create');
    }

    // Store a new product in the database
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle image upload if it exists
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('product_images', 'public');
        }

        // Create the product
        Product::create([
            'name' => $validated['name'],
            'price' => $validated['price'],
            'description' => $validated['description'],
            'image' => $imagePath,
        ]);

        // Redirect to the product index or some other page
        return redirect()->route('admin.products.index')->with('success', 'Product added successfully!');
    }

    // Show the form to edit an existing product
    public function edit(Product $product)
    {
        return view('admin.products.edit', compact('product'));
    }

    // Update a product in the database
    public function update(Request $request, Product $product)
    {
        // Validate the request
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        // Update the product
        $product->update($validatedData);
    
        // If an image was uploaded, handle the image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('product_images', 'public');
            $product->image = $imagePath;
            $product->save();
        }
    
        // Redirect to the product index page with a success message
        return redirect()->route('admin.products.index')->with('success', 'Product updated successfully');
    }

    // Delete a product from the database
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('admin.products')->with('success', 'Product deleted successfully!');
    }
}
