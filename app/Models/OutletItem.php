<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class OutletItem extends Pivot
{
    use HasFactory;
    protected $table = 'outlet_items';
    protected $guarded = [];

    public function outlet()
    {
        return $this->belongsTo(Outlet::class, 'outlet_id', 'id');
    }

    public function item()
    {
        return $this->belongsTo(Item::class, 'item_id', 'id');
    }

    public function saleItem()
    {
        return $this->hasMany(SaleItem::class, 'item_id', 'id');
    }
}
