<?php

namespace App\Http\Controllers;

use App\Models\RentalProduct;
use Illuminate\Http\Request;

class RentalProductController extends Controller
{
    public function index()
    {
        $products = RentalProduct::all();
        return view('rental_products.index', compact('products'));
    }

    public function create()
    {
        return view('rental_products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'sku' => 'required|string|unique:rental_products,sku',
            'available_stock' => 'required|integer|min:0',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:3072',
        ]);

        $data = $request->only(['name', 'sku', 'available_stock']);
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('images', 'public');
        }

        RentalProduct::create($data);

        return redirect()->route('rental_products.index')->with('success', 'Product created successfully.');
    }

    public function edit(RentalProduct $rentalProduct)
    {
        $product = RentalProduct::all();
        return view('rental_products.edit', compact('rentalProduct','product'));
    }

    public function update(Request $request, RentalProduct $rentalProduct)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'sku' => 'required|string|unique:rental_products,sku,' . $rentalProduct->id,
            'available_stock' => 'required|integer|min:0',
            'image' => 'nullable|image|mimes:jpg,jpeg,png',
        ]);

        $data = $request->only(['name', 'sku', 'available_stock']);
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('images', 'public');
        }

        $rentalProduct->update($data);

        return redirect()->route('rental_products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy(RentalProduct $rentalProduct)
    {
        $rentalProduct->delete();
        return redirect()->route('rental_products.index')->with('success', 'Product deleted successfully.');
    }

}
