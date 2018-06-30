<?php

use Illuminate\Database\Seeder;

class InscriptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $events = App\Event::all();

        foreach($events as $event)
        {
            $users = App\User::where('state',$event->state);
            if($users)
            {
                foreach ($users as $user) 
                {
                    $event->users()-attach($user);
                }
            }    
        }
    }
}
