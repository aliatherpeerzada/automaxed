<?php

namespace App\Http\Controllers;

use App\Models\Activity_log;
use App\Models\license;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\SimpleExcel\SimpleExcelReader;

class LicenseController extends Controller
{

    public function import(Request $request){
        $request->validate([
            'file'=>'required|mimes:csv'
        ]);
        SimpleExcelReader::create($request->file('file'),'csv')
                   
                    ->getRows()
                    ->each(function(array $rowProperties) {
                        license::create([
                            'customer_name' => $rowProperties['customer_name'],
                            'customer_email' => $rowProperties['customer_email'],
                            'license_key' => $rowProperties['license_key'],
                            'allowed_activities' => $rowProperties['allowed_activities'],
                            'expiry_date' => $rowProperties['expiry_date'],
                            'status' => $rowProperties['status'],
                            'note' => $rowProperties['note'],
                        ]);
                });

                return redirect('/show-licenses')->with('message','File uploaded successfully');
    }

    public function update_cred(Request $request){
        $data = $request->validate([
            'username'=>'required',
            'secret'=>'required',
            'companyname'=>'required'
        
        ]);
        if($request->password!='')
        {   
          User::first()->update([
              'username'=>$data['username'],
              'secret'=>$data['secret'],
              'password'=>bcrypt($request->password),
              'companyname'=>$data['companyname']
          ]);
        }
        else
        {
            User::first()->update([
                'username'=>$data['username'],
                'secret'=>$data['secret'],
                'companyname'=>$data['companyname']
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
   
        return redirect()->back()->with('message','License Added Successfully');
    }

    public function show(){
        $licenses=license::orderBy('id','desc')
        ->get();
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
       
        return redirect('/show-licenses')->with('message','License Updated Successfully');
             
     

    }
}
