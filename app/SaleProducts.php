<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SaleProducts extends Model
{
    protected $fillable = ['sale_id', 'product_id', 'price', 'qty', 'discount_type', 'discount', 'total'];

    public function product()
    {
        return $this->hasOne(Product::class, 'id');
    }

    public function sale()
    {
        return $this->belongsTo(Sale::class, 'sale_id');
    }
}
