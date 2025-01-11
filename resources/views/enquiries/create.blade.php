@extends('layouts.app')

@section('title', 'Create Enquiry')

@section('content')
    @error('products')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <h2 class="mb-4">Create a New Enquiry</h2>
    <form action="{{ route('enquiries.store') }}" method="POST" class="bg-white shadow p-4 rounded">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Enquiry Title</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="rental_start_date" class="form-label">Rental Start Date</label>
            <input type="date" name="rental_start_date" id="rental_start_date" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="rental_end_date" class="form-label">Rental End Date</label>
            <input type="date" name="rental_end_date" id="rental_end_date" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="products" class="form-label">Select Products</label>
            <select name="products[]" id="products" class="form-select" multiple required>
                @foreach ($products as $product)
                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Save Enquiry</button>
    </form>
@endsection
