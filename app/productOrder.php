<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class productOrder extends Model
{
    

       protected $guarded = [];


		 public function Order(){

		 	return $this->belongsToMany(Order::class,'order_id');

		 }



		  public function product(){

		 	return $this->belongsTo(products::class,'product_id');

		 }



}
