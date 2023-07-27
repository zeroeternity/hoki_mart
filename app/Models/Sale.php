<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sale extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'sales';
    protected $guarded = [];


    public function cashier()
    {
        return $this->belongsTo(User::class, 'cashier_id', 'id');
    }
    public function member()
    {
        return $this->belongsTo(User::class, 'member_id', 'id');
    }

    public function saleItem()
    {
        return $this->hasMany(SaleItem::class, 'sale_id', 'id');
    }

    protected function total(): Attribute{
        return new Attribute(
            get: fn () => $this->saleItem->sum('subtotal'),
        );
    }

}
