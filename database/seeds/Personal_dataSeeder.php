<?php

use Illuminate\Database\Seeder;

class Personal_dataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = App\User::all();
        foreach ($users as $user) {
            factory(App\PersonalData::class)->create(['user_id' => $user->id]);
        }
    }
}
