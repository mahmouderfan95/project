<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sucCategory extends Model
{
    protected $fillable = ['name'];
    /* category function */
    public function category(){
        return $this->belongsTo('App\Category');
    }
    /* end of category function */
}

