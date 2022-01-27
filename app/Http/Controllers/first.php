<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use  App\Models\teacher;
use App\Models\student;

class first extends Controller
{
    
    public function show($idd){
        $a=teacher::find($idd);
        $b=$a->student;
        $drop=student::all();
        return view('save',compact('b','drop'));
    }
    

}
