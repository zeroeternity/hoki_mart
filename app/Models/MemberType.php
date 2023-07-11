<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MemberType extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'member_types';
    protected $guarded = [];

    public function users()
    {
        return $this->hasMany(User::class, 'member_type_id', 'id');
    }
}
