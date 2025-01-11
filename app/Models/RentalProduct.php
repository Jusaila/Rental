<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RentalProduct extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'sku', 'available_stock', 'image'];


    public function enquiries()
    {
        return $this->belongsToMany(Enquiry::class, 'enquiry_product');
    }
}
