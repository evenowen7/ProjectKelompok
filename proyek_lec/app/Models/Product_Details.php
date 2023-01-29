<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_Details extends Model
{
    public $timestamps = false;

    protected $table = 'product_details';
    use HasFactory;

    public function product_category()
    {
        return $this->belongsTo(Product_Category::class);
    }
    public function history_details()
    {
        return $this->hasMany(History_Details::class);
    }
    public function cart_details()
    {
        return $this->hasMany(Cart_Details::class);
    }
}
