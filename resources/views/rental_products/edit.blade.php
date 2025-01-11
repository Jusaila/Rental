@extends('layouts.app')

@section('content')
    <div class="container">
        @error('products')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <h1>Edit Rental Product</h1>

        <form action="{{ route('rental_products.update', $rentalProduct->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Product Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $rentalProduct->name) }}" required>
            </div>

            <div class="mb-3">
                <label for="sku" class="form-label">SKU</label>
                <input type="text" class="form-control" id="sku" name="sku" value="{{ old('sku', $rentalProduct->sku) }}" required>
            </div>

            <div class="mb-3">
                <label for="available_stock" class="form-label">Available Stock</label>
                <input type="number" class="form-control" id="available_stock" name="available_stock" value="{{ old('available_stock', $rentalProduct->available_stock) }}" required>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Product Image</label>
                <input type="file" class="form-control" id="image" name="image">
                @if($rentalProduct->image)
                    <img src="{{ asset('storage/' . $rentalProduct->image) }}" alt="Product Image" class="img-fluid mt-2" width="100">
                @endif
            </div>

            <button type="submit" class="btn btn-primary">Update Product</button>
        </form>
    </div>
@endsection
