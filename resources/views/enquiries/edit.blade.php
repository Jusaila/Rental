@extends('layouts.app')

@section('content')
    <div class="container">
        @error('products')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror

        <h1>Edit Enquiry</h1>

        <form action="{{ route('enquiries.update', $enquiry->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="title" class="form-label">Enquiry Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $enquiry->title) }}" required>
            </div>

            <div class="mb-3">
                <label for="rental_start_date" class="form-label">Rental Start Date</label>
                <input type="date" class="form-control" id="rental_start_date" name="rental_start_date" value="{{ old('rental_start_date', $enquiry->rental_start_date) }}" required>
            </div>

            <div class="mb-3">
                <label for="rental_end_date" class="form-label">Rental End Date</label>
                <input type="date" class="form-control" id="rental_end_date" name="rental_end_date" value="{{ old('rental_end_date', $enquiry->rental_end_date) }}" required>
            </div>

            <div class="mb-3">
                <label for="products" class="form-label">Products</label>
                <select multiple class="form-control" id="products" name="products[]">
                    @foreach ($products as $product)
                        <option value="{{ $product->id }}" {{ in_array($product->id, old('products', $enquiry->products->pluck('id')->toArray())) ? 'selected' : '' }}>
                            {{ $product->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Update Enquiry</button>
        </form>
    </div>
@endsection
