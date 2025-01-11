@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Enquiries</h1>
        <a href="{{ route('enquiries.create') }}" class="btn btn-success mb-3">Create New Enquiry</a>

        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Rental Start Date</th>
                        <th>Rental End Date</th>
                        <th>Products</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($enquiries as $enquiry)
                        <tr>
                            <td>{{ $enquiry->title }}</td>
                            <td>{{ $enquiry->rental_start_date }}</td>
                            <td>{{ $enquiry->rental_end_date }}</td>
                            <td>
                                @foreach ($enquiry->products as $product)
                                    {{ $product->name }}
                                @endforeach
                            </td>
                            <td>
                                <a href="{{ route('enquiries.edit', $enquiry->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                <form action="{{ route('enquiries.destroy', $enquiry->id) }}" method="POST" class="d-inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
