<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReceivableMovements extends Model
{
    use HasFactory;
    protected $table = 'receivable_movements';
    protected $guarded = [];
}
