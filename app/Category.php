<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name'];
    /* product function */
    public function product(){
        return $this->hasMany('App\Product');
    }
    /* end of product function */
    /* sub category function */
    public function subCategory(){
        return $this->hasMany('App\subCategory');
    }
    /* end of subcategory function */
}
