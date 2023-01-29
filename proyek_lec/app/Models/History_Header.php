<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History_Header extends Model
{
    protected $table = 'history_headers';
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function history_details()
    {
        return $this->hasMany(History_Details::class, 'history_headers_id');
    }
}
