<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {
        $products = Product::all();
        return view('user.home', compact('products'));
    }

    public function showProductDetails($id) {
        $product = Product::findOrFail($id);
        return view('user.product_details', compact('product'));
    }
}
