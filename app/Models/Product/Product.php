<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'short_description', 'slug', 'category_id', 'brand_id', 'subcatagory_id', 'marchant_id', 'offer_price', 'regular_price', 'sale_price', 'review', 'price', 'quantity', 'image', 'status'];


}
