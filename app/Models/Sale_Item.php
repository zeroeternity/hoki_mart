<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale_Item extends Model
{
    use HasFactory;
    protected $table = 'sale_items';

    protected $guarded = [];

}