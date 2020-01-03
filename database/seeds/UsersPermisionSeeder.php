<?php

use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;



class UsersPermisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         
         $role = Role::create(['name' => 'SuberAdmin']);
         Role::create(['name' => 'Admin']);

    $permission = [
    	   'create','read','update','delete','create_cat','read_cat','update_cat','delete_cat',
    	   'create_pro','read_pro','update_pro','delete_pro','create_cli','read_cli','update_cli',
    	   'delete_cli','create_ord','read_ord','update_ord','delete_ord'
    	  ];     

		  foreach ($permission as $value) {

		         Permission::create(['name' => $value]);
		  }


		  $role->givePermissionTo($permission);



    }
}
