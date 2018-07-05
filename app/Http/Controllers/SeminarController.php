<?php

namespace App\Http\Controllers;
use App\Seminar;
use Illuminate\Http\Request;

class SeminarController extends Controller
{
    public function edit(Request $request)
    {
        if($request->value){
            $seminar = Seminar::find($request->dataId);
            $field = $request->field;
            if($seminar->$field != $request->value){
                $seminar->$field = $request->value;
                $seminar->save();
            }
            return response($seminar);
        }
    }

    public function delete($id)
    {
        $seminar = Seminar::find($id);
        $seminar->events()->delete();
        $seminar->delete();
        
        return redirect('/admin');
    }

    public function createForm()
    {
        return view('admin.seminars.create');
    }

    public function create(Request $request)
    {
        $request->validate(['title'=>'required|unique:seminars']);
        Seminar::create($request->except('_token'));
        return redirect('/admin');
    }
}
