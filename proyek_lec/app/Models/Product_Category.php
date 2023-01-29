<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_Category extends Model
{
    public $timestamps = false;

    protected $table = 'product_categories';
    use HasFactory;

    public function product_details()
    {
        return $this->hasMany(Product_Details::class, 'product_categories_id');
    }
}
