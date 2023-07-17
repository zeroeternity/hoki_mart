<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Group extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'groups';
    protected $guarded = [];

    public function item()
    {
        return $this->hasMany(Item::class, 'group_id', 'id');
    }
}
