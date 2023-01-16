<?php

namespace App\Http\Controllers;

use App\Models\Activity_log;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    //
    public function show(){
$data =Activity_log::orderBy('id','desc')->get();

return view('activity_log',['datas'=>$data]);
    }
}
