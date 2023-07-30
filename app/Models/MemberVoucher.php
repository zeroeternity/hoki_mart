<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemberVoucher extends Model
{
    use HasFactory;
    protected $table = 'member_vouchers';
    protected $guarded = [];
}
