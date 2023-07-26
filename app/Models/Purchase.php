<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Purchase extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'purchases';
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function supllier()
    {
        return $this->belongsTo(Supplier::class, 'supllier_id', 'id');
    }

    public function purchaseItem()
    {
        return $this->hasMany(PurchaseItem::class, 'purchase_id', 'id');
    }
}
