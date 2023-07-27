<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class SaleItem extends Pivot
{
    use HasFactory;

    protected $table = 'sale_items';

    protected $guarded = [];
    protected $appends = ['subtotal', 'total'];

    public function sales()
    {
        return $this->belongsTo(Sale::class, 'sale_id', 'id');
    }

    public function items()
    {
        return $this->belongsToMany(Item::class, 'outlet_items')->using(OutletItem::class);
    }

    protected function total(): Attribute
    {
        return Attribute::get(function ($value, array $attributes) {
            return $attributes['qty'] * $attributes['sale_price'];
        });
    }

    public function outletItem()
    {
        return $this->belongsTo(OutletItem::class, 'outlet_item_id', 'id');
    }

    protected function subtotal(): Attribute
    {
        return new Attribute(
            get: fn() => $this->qty * $this->sale_price,
        );
    }
}
