<?php

namespace Cyberplus;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $fillable = [
        'serial_number', 'item_id', 'user_id', 'quantity',
    ];
}
