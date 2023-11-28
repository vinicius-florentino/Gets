<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendas extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'buyer_id',
        'quantity',
    ];

    public function product()
    {
        return $this->belongsTo(Products::class);
    }

    public function buyer()
    {
        return $this->belongsTo(User::class);
    }
}
