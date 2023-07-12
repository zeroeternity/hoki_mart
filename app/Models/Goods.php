<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Goods extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'goods';
    protected $guarded = [];

    public function group()
    {
        return $this->belongsTo(Goods::class, 'group_id', 'id');
    }

    public function ppnType()
    {
        return $this->belongsTo(PPNType::class, 'ppn_type_id', 'id');
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class, 'unit_id', 'id');
    }
}
