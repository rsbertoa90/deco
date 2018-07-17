<?php

namespace App\Http\Controllers;
use App\Seminar;
use App\Program;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function panel()
    {
        $seminars = Seminar::all();
        $headers = [
            'title' => 'nombre',
            'description' => 'descripcion',
        ];
        return view('admin/panel',compact('seminars','headers'));
    }

    // AJAX
    public function ediTableSeminars()
    {
        $seminars = Seminar::all();
      
        return view('admin/seminars/edi-table',compact('seminars'));
    }

    public function ediTableSeminar($id)
    {
       
       
    }
}
