<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'description', 'price'];

    public function sales()
    {
        return $this->hasMany(SaleProducts::class, 'product_id');
    }
}
