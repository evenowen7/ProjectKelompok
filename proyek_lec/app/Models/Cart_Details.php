<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart_Details extends Model
{
    public $timestamps = false;
    protected $table = 'cart_details';
    use HasFactory;

    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }

    public function product_details()
    {
        return $this->belongsTo(Product_Details::class);
    }
}
