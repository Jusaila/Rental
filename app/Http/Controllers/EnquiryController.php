<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use App\Models\Enquiry;
use App\Models\RentalProduct;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class EnquiryController extends Controller
{
public function index()
    {
        $enquiries = Enquiry::with('products')->get();
        return view('enquiries.index', compact('enquiries'));
    }

    public function create()
    {
        $products = RentalProduct::all();
        return view('enquiries.create', compact('products'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string',
            'rental_start_date' => 'required|date',
            'rental_end_date' => 'required|date|after_or_equal:rental_start_date',
            'products' => 'required|array',
        ]);

        // Validate product availability
        $this->validateProductAvailability(
            $validated['products'],
            $validated['rental_start_date'],
            $validated['rental_end_date']
        );

        $enquiry = Enquiry::create($validated);
        $enquiry->products()->attach($validated['products']);

        return redirect()->route('enquiries.index');
    }

    public function edit(Enquiry $enquiry)
    {
        $products = RentalProduct::all();
        return view('enquiries.edit', compact('enquiry', 'products'));
    }

    public function update(Request $request, Enquiry $enquiry)
    {

        $validated = $request->validate([
            'title' => 'required|string',
            'rental_start_date' => 'required|date',
            'rental_end_date' => 'required|date|after_or_equal:rental_start_date',
            'products' => 'required|array',
        ]);


        // Validate product availability

            $this->validateProductAvailability(
                $validated['products'],
                $validated['rental_start_date'],
                $validated['rental_end_date']
            );


        $enquiry->update($validated);
        $enquiry->products()->sync($validated['products']);

        return redirect()->route('enquiries.index');
    }

    public function destroy(Enquiry $enquiry)
    {
        $enquiry->delete();
        return redirect()->route('enquiries.index');
    }

//validation for dates

    private function validateProductAvailability($products, $startDate, $endDate)
    {

        foreach ($products as $productId) {
            $product = RentalProduct::findOrFail($productId);

            $overlappingEnquiries = $product->enquiries()
                ->where(function ($query) use ($startDate, $endDate) {
                    $query->whereBetween('rental_start_date', [$startDate, $endDate])
                          ->orWhereBetween('rental_end_date', [$startDate, $endDate]);
                })->exists();

            if ($overlappingEnquiries) {
                throw ValidationException::withMessages([
                    'products' => "Product {$product->name} is unavailable for the selected dates."
                ]);
            }
        }
    }
}
