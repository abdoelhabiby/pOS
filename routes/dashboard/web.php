<?php

  
/* 
   To DashBoard
*/

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

Route::group(
[
	'prefix' => LaravelLocalization::setLocale(),
	'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ,'auth']
], function(){ 



			Route::prefix('/dashboard')->group(function(){


	              Route::get('/home','DashboardController@index')->name('home');
   

	     	     Route::get('/premission',function(){
                       
                       // $role = Role::find(1);

                       // $role->givePermissionTo(['create','read','update','delete']);
                        
                        // $permission = auth()->user()->getAllPermissions();

                        // foreach ($permission as $value) {
                        // 	echo $value['name'] . " | " ;
                        // }


           //                     $permission = Permission::where('id' , '>' ,'12')->pluck('name');

							    //  // return $Permission;
							        
							    // $role = Role::find(1);

							    //  //return $role;

							    //  $role->givePermissionTo($permission);


	     	
	     	    



								     	
                    

                       
	     	     });


             //-------------------usesr route ----------------------

	     	     Route::resource("/users",'UserController')->except(['show']);

	     	     Route::resource("/category",'CategoryController')->except(['show']);

	     	     Route::resource("/products",'productController')->except(['show']);


	     	     Route::resource("/client",'ClientController')->except(['show']);
	     	     
	     	     Route::resource("/client/order",'Client\OrderController')->except(['show']);

	     	     Route::resource("/orders",'OrderController')->except(['show']);

	     	     Route::get("/orders/{id}/products",'OrderController@products')->name('order.products');
	           

         

		    });


});










