<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    protected $fillable = [
        'serial_number', 'item_id', 'user_id', 'quantity', 
    ];
}
