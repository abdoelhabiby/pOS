<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class products extends Model
{
     
      protected $guarded = [];




     public function getNameAttribute($value){

     	return ucfirst($value);
     }

    
     public function getDescriptionAttribute($value){

     	return ucfirst($value);
     }
    

    public function category(){

    	return $this->belongsTo(Category::class,'category_id');
    } 

}
