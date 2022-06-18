<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    
   protected $guarded =[];





 public function getNameAttribute($val){

 	return ucfirst($val);

 }


 public function order(){
    
    return $this->hasMany(Order::class);

 }

 
}
