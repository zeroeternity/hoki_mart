<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleVoucherItem extends Model
{
    use HasFactory;
    protected $table = 'sale_voucher_items';
    protected $guarded = [];
    protected $appends = ['subtotal', 'totalVoucher'];

    public function sales()
    {
        return $this->belongsTo(Sale::class, 'sale_id', 'id');
    }

    public function voucherItem()
    {
        return $this->belongsTo(ItemVoucher::class, 'item_voucher_id', 'id');
    }

    protected function total(): Attribute
    {
        return Attribute::get(function ($value, array $attributes) {
            return $attributes['qty'] * $attributes['sale_price'];
        });
    }

    protected function subtotal(): Attribute
    {
        return new Attribute(
            get: fn() => $this->qty * $this->sale_price,
        );
    }
}
