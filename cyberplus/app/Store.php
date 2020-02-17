<?php

namespace Cyberplus;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    //
    protected $fillable = [
        'store_name', 'store_email','store_phone_number', 'user_id', 'type_id',
    ];
}
