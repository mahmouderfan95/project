<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name','desc','image','category_id','Purchasing_price','selling_price','stock'];
    /* function category */
    public function category(){
        return $this->belongsTo('App\Category');
    }
    /* end of category */
    /* appends */
    protected $appends = ['profit_precent'];
    /* function profit precent */
    public function getProfitPrecentAttribute(){
        $profit = $this->selling_price - $this->Purchasing_price;
        $profit_precent = $profit * 100 / $this->Purchasing_price;
        return $profit_precent;
    }
    /* end of profit precent */

}
