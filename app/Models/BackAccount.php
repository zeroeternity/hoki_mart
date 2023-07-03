<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BackAccount extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'm_bank_accounts';
    protected $guarded = [];
}
