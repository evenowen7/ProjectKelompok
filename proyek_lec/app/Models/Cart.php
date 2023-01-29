<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    public $timestamps = false;

    use HasFactory;

    public function cart_details()
    {
        return $this->hasMany(Cart_Details::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
