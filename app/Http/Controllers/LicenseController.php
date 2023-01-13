<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class LicenseController extends Controller
{

    public function update_cred(Request $request){
        $data = $request->validate([
            'username'=>'required',
            'secret'=>'required',
        
        ]);
        if($request->password!='')
        {   
          User::first()->update([
              'username'=>$data['username'],
              'secret'=>$data['secret'],
              'password'=>bcrypt($request->password)
          ]);
        }
        else
        {
            User::first()->update([
                'username'=>$data['username'],
                'secret'=>$data['secret'],
            ]);
            
        }
              return redirect()->back()->with('message','Record Updated Successfully');

    }
   

    public function add(Request $request){
        dd($request);
    }

    public function show(){
        
    }
    //
}
