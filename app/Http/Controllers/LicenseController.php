<?php

namespace App\Http\Controllers;

use App\Models\Activity_log;
use App\Models\license;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

      $data=  license::create([
            'customer_name'=>$data['customer_name'],
            'customer_email'=>$data['customer_email'],
            'license_key'=>$data['license_key'],
            'allowed_activities'=>$data['activity'],
            'expiry_date'=>$data['expiry_date'],
            'status'=>$data['status'],
            'note'=>$request['note'],

        ]);
        Activity_log::create([
            'license_id'=>$data->id,
            'user_id'=>Auth::user()->id,
                        'status'=>'CREATED'
                    ]);

        return redirect()->back()->with('message','License Added Successfully');
    }

    public function show(){
        $licenses=license::all();
return view('show-license',['licenses'=>$licenses]);
    }
    //
    public function delete(Request $request,$id){
        license::where('id',$id)->delete();
        return redirect()->back()->with('message','License Deleted Successfully');
    }


    public function licenseUpdate(Request $request,$id){
    
        $data = $request->validate([
        'status'=>'required',
        'customer_name'=>'required',
        'customer_email'=>'required',
        'license_key'=>'required',
        'activity'=>'required',
        'expiry_date'=>'required',
                ]);
        
                license::where('id',$id)->first()->update([
                    'customer_name'=>$data['customer_name'],
                    'customer_email'=>$data['customer_email'],
                    'license_key'=>$data['license_key'],
                    'allowed_activities'=>$data['activity'],
                    'expiry_date'=>$data['expiry_date'],
                    'status'=>$data['status'],
                    'note'=>$request['note'],
        
                ]);
        Activity_log::where('license_id',$data[$id])->first()->update([
'user_id'=>Auth::user()->id,
            'status'=>'UPDATED'
        ]);

        return redirect('/show-licenses')->with('message','License Updated Successfully');
             
     

    }
}
