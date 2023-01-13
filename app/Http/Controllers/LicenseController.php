<?php

namespace App\Http\Controllers;

use App\Models\license;
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
        // dd($request);
        $data = $request->validate([
'status'=>'required',
'customer_name'=>'required',
'customer_email'=>'required',
'license_key'=>'required',
'activity'=>'required',
'expiry_date'=>'required',
        ]);

        license::create([
            'customer_name'=>$data['customer_name'],
            'customer_email'=>$data['customer_email'],
            'license_key'=>$data['license_key'],
            'allowed_activities'=>$data['activity'],
            'expiry_date'=>$data['expiry_date'],
            'status'=>$data['status'],
            'note'=>$request['note'],

        ]);

        return redirect()->back()->with('message','Customer Added Successfully');
    }

    public function show(){

    }
    //
}
