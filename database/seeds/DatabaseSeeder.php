<?php

use Illuminate\Database\Seeder;
use App\user;



class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call('RolesTableSeeder');
        $this->call('UsersTableSeeder');
        $this->call('Personal_dataSeeder');
        $this->call('SeminarSeeder');
        $this->call('ProgramSeeder');
        $this->call('TopicSeeder');
        $this->call('EventSeeder');
        $this->call('InscriptionSeeder');
        $this->call('PaymentSeeder');

    }
}
