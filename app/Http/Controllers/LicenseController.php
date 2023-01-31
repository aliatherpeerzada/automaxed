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
            'license_import_file'=>'required|mimes:csv'
        ]);
        SimpleExcelReader::create($request->file('license_import_file'),'csv')
                   
                    ->getRows()
                    ->each(function(array $rowProperties) {
          $count=license::where('license_product_name',$rowProperties['license_product_name'])->get()->count();
        if($count<1){
         license::create([
                            'license_status'=> $rowProperties['license_status'],
                            'license_product_name'=> $rowProperties['license_product_name'],
                            'license_expiry_date'=> $rowProperties['license_expiry_date'],
                            'license_used_activations'=> 0,
                           'license_allowed_activations'=> $rowProperties['license_allowed_activations'],
                            'license_key'=> $rowProperties['license_key'],
                            'license_customer_name'=> $rowProperties['license_customer_name'],
                            'license_customer_email'=> $rowProperties['license_customer_email'],
                            'license_note'=> $rowProperties['license_note']
                        ]);
                    }
                   
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
        $license_status=0;
        if($request->has('license_status')){
            $license_status=1;
        }
        $data = $request->validate([
        'license_product_name'=>'required',
        'license_customer_name'=>'required',
        'license_key'=>'required',
        'license_allowed_activations'=>'required',
        'license_expiry_date'=>'required',
                ]);
        
                license::where('id',$id)->first()->update([
                    'license_status'=>$license_status,
                    'license_product_name'=>$request->license_product_name,
                    'license_expiry_date'=>$request->license_expiry_date,
                   'license_allowed_activations'=>$request->license_allowed_activations,
                    'license_key'=>$request->license_key,
                    'license_customer_name'=>$request->license_customer_name,
                    'license_customer_email'=>$request->license_customer_email,
                    'license_note'=>$request->license_note        
                ]);
       
        return redirect('/show-licenses')->with('message','License Updated Successfully');
             
     

    }
}
