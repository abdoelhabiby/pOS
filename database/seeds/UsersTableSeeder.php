<?php

use Illuminate\Database\Seeder;
use App\User;

use Spatie\Permission\Models\Role;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $user = User::create([
          'email' => 'a@a.com',
          'name' => 'ahmed',
          'password' => bcrypt(123456789)
        ]);


       $user->assignRole('SuberAdmin');
    }
}
