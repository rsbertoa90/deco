<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\UnregisteredUser;
use App\Inscription;

class InscriptionController extends Controller
{
    public function userSearch($input)
    {
        return UnregisteredUser::where('fbname','like',"%{$input}%")->get();
    }

     public function getPresencials($id)
    {
        return Inscription::where('unregistered_user_id',$id)->with('event.seminar')->with('unregisteredUser')->whereHas('event',function($query){
            $query->where('mode', 'like', 'presencial');
        })->with('payments')->get();
    }
    public function getOnline($id)
    {
        return Inscription::where('unregistered_user_id',$id)->with('event.seminar')->with('unregisteredUser')->whereHas('event',function($query){
            $query->where('mode', 'like', 'online');
        })->with('payments')->get();
    }

    public function registerInscription(Request $request)
    {
        $request->validate([
            'events' => 'required',
            'fbname' => 'required'
        ]);
        $user = UnregisteredUser::findOrCreate($request->fbname);
        if ($request->email){
            $user->email = $request->email;
            $user->save();
        }
        
        $inscription = new \App\Inscription();

        foreach($request->events as $id){
            $inscription = new Inscription();
            $inscription->event_id = $id;
            $inscription->user_type = 'unregistered';
            $inscription->unregistered_user_id = $user->id;
            $inscription->comments = $request->comments;
            $inscription->save();
        }
        return redirect('/admin/inscriptions');
    }

    public function delete($id)
    {
        $inscription = Inscription::find($id);
        $user = $inscription->unregisteredUser;
        
        $user->wallet += $inscription->payd;
        $user->save();
            
        
        $inscription->delete();
    }



}
