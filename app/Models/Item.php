<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'items';
    protected $guarded = [];

    public function group()
    {
        return $this->belongsTo(Group::class, 'group_id', 'id');
    }

    public function ppnType()
    {
        return $this->belongsTo(PPNType::class, 'ppn_type_id', 'id');
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class, 'unit_id', 'id');
    }

    public function outletItem()
    {
        return $this->hasMany(OutletItem::class, 'item_id', 'id');
    }

    public function purchaseItem()
    {
        return $this->hasMany(PurchaseItem::class, 'item_id', 'id');
    }


}
