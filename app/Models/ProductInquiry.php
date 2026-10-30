<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductInquiry extends Model
{
    protected $fillable = [
        'product_id',
        'buyer_id',
        'seller_id',
        'message',
        'status',
    ];

    // Product associated with the inquiry
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    // Student who sent the inquiry
    public function buyer()
    {
        return $this->belongsTo(User::class, 'buyer_id');
    }

    // Seller who receives the inquiry
    public function seller()
    {
        return $this->belongsTo(User::class, 'seller_id');
    }
}