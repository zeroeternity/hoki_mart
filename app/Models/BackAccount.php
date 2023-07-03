<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BackAccount extends Model
{
    use HasFactory;
    protected $table = 'm_bank_accounts';
    protected $guarded = [];
}
