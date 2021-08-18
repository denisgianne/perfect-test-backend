<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = ['customer_id', 'status', 'date', 'total'];
    protected $casts = ['date' => 'date'];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function products()
    {
        return $this->hasMany(SaleProducts::class, 'sale_id');
    }
}
