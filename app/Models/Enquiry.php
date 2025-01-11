<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enquiry extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'rental_start_date', 'rental_end_date'];

    public function products()
    {
        return $this->belongsToMany(RentalProduct::class, 'enquiry_product');
    }
}
