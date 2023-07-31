<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemVoucher extends Model
{
    use HasFactory;
    protected $table = 'item_vouchers';
    protected $guarded = [];
}
