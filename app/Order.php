<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    
  protected $guarded = [];



  public function client(){

  	return $this->belongsTo(Client::class,'client_id');
  }



  public function product(){

  	return $this->belongstoMany(products::class,'product_orders')->withPivot('quantity');
  }


}
