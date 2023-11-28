<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_product',
        'price',
        'quantity',
        'description',
        'sellerid',
        'image'
    ];

    public function seller()
    {
        return $this->belongsTo(User::class);
    }
}
