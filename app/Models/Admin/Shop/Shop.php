<?php

namespace App\Models\Admin\Shop;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'photo', 'address', 'trade_license', 'market_id', 'author', 'author_id', 'division_id', 'district_id', 'upazila_id'];
}
