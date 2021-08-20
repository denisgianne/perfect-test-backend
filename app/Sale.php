<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = ['customer_id', 'status', 'date', 'total'];
    protected $casts = ['date' => 'date'];

    const STATUS_NULL       = null;
    const STATUS_SOLD       = 'sold';
    const STATUS_CANCEL     = 'cancel';
    const STATUS_RETURNED   = 'returned';

    /**
     * Return list of status codes and labels
     * @return array
     */
    public static function status_list()
    {
        return [
            self::STATUS_NULL       => 'Nenhum',
            self::STATUS_SOLD       => 'Vendido',
            self::STATUS_CANCEL     => 'Cancelado',
            self::STATUS_RETURNED   => 'Devolvido',
        ];
    }
    public function getStatusListAttribute()
    {
        return $this->status_list();
    }

    /**
     * Returns label of actual status
     * @param string
     */
    public function status_label()
    {
        $list = self::status_list();
        return isset($list[$this->status])
            ? $list[$this->status]
            : $this->status;
    }
    public function getStatusLabelAttribute()
    {
        return $this->status_label($this->status);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function products()
    {
        return $this->hasMany(SaleProduct::class);
    }

    public static function boot()
    {
        parent::boot();
        self::deleting(function ($model) {
            $model->products()->delete();
        });
    }
}
