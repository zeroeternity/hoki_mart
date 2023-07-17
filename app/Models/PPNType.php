<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PPNType extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'ppn_types';
    protected $guarded = [];

    public function item()
    {
        return $this->hasMany(Item::class, 'ppn_type_id', 'id');
    }
}
