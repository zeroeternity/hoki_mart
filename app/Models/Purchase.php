<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Purchase extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'purchases';
    protected $guarded = [];
    protected $appends = ['total'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id', 'id');
    }

    public function purchaseItem()
    {
        return $this->hasMany(PurchaseItem::class, 'purchase_id', 'id');
    }

    protected function total(): Attribute{
        return new Attribute(
            get: fn () => $this->purchaseItem->sum('subtotal'),
        );
    }
}
