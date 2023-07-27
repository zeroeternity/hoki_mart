<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleItem extends Model
{
    use HasFactory;
    protected $table = 'sale_items';

    protected $guarded = [];
    protected $appends = ['subtotal'];

    public function sale()
    {
        return $this->belongsTo(Sale::class, 'sale_id', 'id');
    }

    public function item()
    {
        return $this->belongsTo(Item::class, 'item_id', 'id');
    }

    public function outlet_item()
    {
        return $this->belongsTo(OutletItem::class, 'outlet_item_id', 'id');
    }

    protected function subtotal(): Attribute{
        return new Attribute(
            get: fn () => $this->qty * $this->sale_price,
        );
    }
}
