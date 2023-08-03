<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemVoucher extends Model
{
    use HasFactory;
    protected $table = 'item_vouchers';
    protected $guarded = [];

    public function items()
    {
        return $this->belongsTo(Item::class, 'item_id', 'id');
    }

    public function outlet()
    {
        return $this->belongsTo(Outlet::class, 'outlet_id', 'id');
    }
}
