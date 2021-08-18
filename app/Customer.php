<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = ['name', 'email', 'cpf'];

    public function sales()
    {
        return $this->hasMany(Sale::class, 'customer_id');
    }
}
