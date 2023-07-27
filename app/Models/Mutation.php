<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mutation extends Model
{
    use HasFactory;
    protected $table = 'mutations';
    protected $guarded = [];

    public function outletItem()
    {
        return $this->belongsTo(OutletItem::class, 'outlet_item_id', 'id');
    }
}

