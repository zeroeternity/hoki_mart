<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sale extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'sales';
    protected $guarded = [];
    protected $appends = ['total', 'totalVoucher'];


    public function userCashier()
    {
        return $this->belongsTo(User::class, 'cashier_id', 'id');
    }

    public function userMember()
    {
        return $this->belongsTo(User::class, 'member_id', 'id');
    }

    public function cashier()
    {
        return $this->belongsTo(User::class, 'cashier_id', 'id');
    }

    public function member(): BelongsTo
    {
        return $this->belongsTo(User::class, 'member_id', 'id');
    }

    public function items(): BelongsToMany
    {
        return $this->belongsToMany(Item::class, 'sale_items', 'sale_id', 'outlet_item_id',)
            ->withPivot(['qty', 'sale_price'])
            ->using(SaleItem::class);
    }

    public function voucherItem(): BelongsToMany
    {
        return $this->belongsToMany(ItemVoucher::class, 'sale_voucher_items', 'sale_id', 'item_voucher_id',)
            ->withPivot(['qty', 'sale_price'])
            ->using(SaleItem::class);
    }

    public function saleItem()
    {
        return $this->hasMany(SaleItem::class, 'sale_id', 'id');
    }

    public function saleVoucherItem()
    {
        return $this->hasMany(SaleVoucherItem::class, 'sale_id', 'id');
    }

    protected function total(): Attribute
    {
        return new Attribute(
            get: fn() => $this->saleItem->sum('subtotal'),
        );
    }

    protected function totalVoucher(): Attribute
    {
        return new Attribute(
            get: fn() => $this->saleVoucherItem->sum('subtotal'),
        );
    }
}
