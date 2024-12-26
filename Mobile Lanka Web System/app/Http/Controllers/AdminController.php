<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function __construct()
    {
        // Ensure the user is logged in and is an admin before accessing the admin routes
        $this->middleware('auth');
    }

    public function dashboard()
    {
        // Check if the logged-in user is an admin
        if (Auth::user()->role !== 'admin') {
            return redirect('/home')->with('error', 'You do not have admin access');
        }

        return view('admin.dashboard');
    }

    public function viewProducts()
    {
        // Check if the logged-in user is an admin
        if (Auth::user()->role !== 'admin') {
            return redirect('/home')->with('error', 'You do not have admin access');
        }

        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    public function createProduct()
    {
        // Check if the logged-in user is an admin
        if (Auth::user()->role !== 'admin') {
            return redirect('/home')->with('error', 'You do not have admin access');
        }

        return view('admin.products.create');
    }

    public function storeProduct(Request $request)
    {
        // Check if the logged-in user is an admin
        if (Auth::user()->role !== 'admin') {
            return redirect('/home')->with('error', 'You do not have admin access');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
            'image' => 'nullable|image',
        ]);

        $product = new Product;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
            $product->image = $imagePath;
        }

        $product->save();

        return redirect()->route('admin.products')->with('success', 'Product added successfully');
    }

    public function editProduct($id)
    {
        // Check if the logged-in user is an admin
        if (Auth::user()->role !== 'admin') {
            return redirect('/home')->with('error', 'You do not have admin access');
        }

        $product = Product::findOrFail($id);
        return view('admin.products.edit', compact('product'));
    }

    public function updateProduct(Request $request, $id)
    {
        // Check if the logged-in user is an admin
        if (Auth::user()->role !== 'admin') {
            return redirect('/home')->with('error', 'You do not have admin access');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
            'image' => 'nullable|image',
        ]);

        $product = Product::findOrFail($id);
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
            $product->image = $imagePath;
        }

        $product->save();

        return redirect()->route('admin.products')->with('success', 'Product updated successfully');
    }

    public function deleteProduct($id)
    {
        // Check if the logged-in user is an admin
        if (Auth::user()->role !== 'admin') {
            return redirect('/home')->with('error', 'You do not have admin access');
        }

        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('admin.products')->with('success', 'Product deleted successfully');
    }
}
