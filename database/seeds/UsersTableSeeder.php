<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $role_admin  = Role::where('name', 'admin')->first();

      // $employee = new User();
      // $employee->name = 'user';
      // $employee->email = 'user@gmail.com';
      // $employee->password = bcrypt('secret');
      // $employee->save();
      // $employee->roles()->attach($role_user);

      $manager = new User();
      $manager->name = 'admin';
      $manager->email = 'admin@gmail.com';
      $manager->password = bcrypt('admin');
      $manager->save();
      $manager->roles()->attach($role_admin);
      

      factory(App\User::class,50)->create();
    }
}
