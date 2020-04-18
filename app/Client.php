<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = ['name','address','phone'];

    protected $casts = [
        'phone' => 'array'
    ];

}
