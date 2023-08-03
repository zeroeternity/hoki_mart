<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Outlet extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'outlets';
    protected $guarded = [];

    public function users()
    {
        return $this->hasMany(User::class, 'outlet_id', 'id');
    }

    public function itemVoucher()
    {
        return $this->hasMany(ItemVoucher::class, 'outlet_id', 'id');
    }
}
