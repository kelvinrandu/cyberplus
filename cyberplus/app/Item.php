<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = [
        'item_name', 'item_price', 'item_quantity', 'item_description', 'user_id', 
    ];
}
