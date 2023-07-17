<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Unit extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'units';
    protected $guarded = [];

    public function item()
    {
        return $this->hasMany(Item::class, 'unit_id', 'id');
    }
}
