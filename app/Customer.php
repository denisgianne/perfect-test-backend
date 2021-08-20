<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = ['name', 'email', 'cpf'];

    public function sales()
    {
        return $this->hasMany(Sale::class);
    }

    public static function boot()
    {
        parent::boot();
        self::deleting(function ($model) {
            $model->sales()->delete();
        });
    }
}
