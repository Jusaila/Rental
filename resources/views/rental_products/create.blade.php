@extends('layouts.app')

@section('title', 'Create Rental Product')

@section('content')
    @error('products')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <h2 class="mb-4">Create a New Rental Product</h2>
    <form action="{{ route('rental_products.store') }}" method="POST" enctype="multipart/form-data" class="bg-white shadow p-4 rounded">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Product Name</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="sku" class="form-label">SKU</label>
            <input type="text" name="sku" id="sku" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="available_stock" class="form-label">Available Stock</label>
            <input type="number" name="available_stock" id="available_stock" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Product Image</label>
            <input type="file" name="image" id="image" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Save Product</button>
    </form>
@endsection

