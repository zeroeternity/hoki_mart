<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Adjustment extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'adjustments';
    protected $guarded = [];


    public function outlet_item()
    {
        return $this->belongsTo(OutletItem::class, 'outlet_item_id', 'id');
    }
}
