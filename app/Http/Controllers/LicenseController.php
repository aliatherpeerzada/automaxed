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

        if($request->password!='')
        {   
          User::first()->update([
              'username'=>$request->admin_username,
              'secret'=>$request->admin_secret_phrase,
              'password'=>bcrypt($request->admin_password),
          ]);
        }
        else
        {
            User::first()->update([
                'username'=>$request->admin_username,
                'secret'=>$request->admin_secret_phrase,
            ]);
            
        }
              return redirect()->back()->with('message','Credentials Updated Successfully');

    }
   
    public function change_name(Request $request){
        $request->validate([
            'admin_company_name'=>'required'
        ]);

        User::first()->update([

                'companyname'=>$request->admin_company_name
            ]);
            return redirect()->back()->with('message','Admin Company Name Updated Successfully');


    }

    public function add(Request $request){
        $license_status=0;
        if($request->has('license_status')){
            $license_status=1;
        }
        $data = $request->validate([
            'license_product_name'=>'unique:licenses'
        ]);

// dd($request);
      $data=  license::create([
        'license_status'=>$license_status,
        'license_product_name'=>$request->license_product_name,
        'license_expiry_date'=>$request->license_expiry_date,
       'license_allowed_activations'=>(int)$request->license_allowed_activations,
        'license_key'=>$request->license_key,
        'license_customer_name'=>$request->license_customer_name,
        'license_customer_email'=>$request->license_customer_email,
        'license_note'=>$request->license_note
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
