<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseJournal extends Model
{
    use HasFactory;
    protected $table = 'purchase_journals';
    protected $guarded = [];
}
