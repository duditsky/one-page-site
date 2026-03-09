<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    protected $fillable = [
        'name',
        'type',
        'features',
        'price',
        'image',
        'in_stock',
    ];

    public function getTotalPriceAttribute()
    {
        return $this->quantity * $this->unit_price;
    }
}
