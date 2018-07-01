<?php

use Illuminate\Database\Seeder;
use App\Event;
use App\User;
use App\PersonalData;
class InscriptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $events = Event::all();
        
            
        foreach($events as $event)
        {

            $data = PersonalData::all();
            foreach ($data as $d){
                if ($d->state == $event->state){
                    $user = $d->user;
                    $event->users()->attach($user);
                }
            }

        }
    }
}
