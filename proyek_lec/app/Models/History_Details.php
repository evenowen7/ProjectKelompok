<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History_Details extends Model
{
    protected $table = 'history_details';
    use HasFactory;

    public function history_header()
    {
        return $this->belongsTo(History_Header::class, 'history_details_id');
    }
    public function product_details()
    {
        return $this->belongsTo(Product_Details::class);
    }
}
