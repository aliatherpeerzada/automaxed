<?php

use App\Http\Controllers\ApiController;
use App\Models\Activity_log;
use App\Models\license;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Stevebauman\Location\Facades\Location;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::POST('/useLicense',function(Request $request){
    
    $request->validate([
'license_product_name'=>'required',
'license_key'=>'required',
'license_hardware_id'=>'required'
    ]);
    
    $ip=$request->ip()=="::1"?'127.0.0.1':$request->ip();
    $pip = file_get_contents('https://api.ipify.org');

    $hid=exec('getmac');
    $hid = strtok($hid, ' '); 
    $country=Location::get($pip)->countryName;

    $license_product_name=$request->license_product_name;
    $license_key=$request->license_key;

$checkCount = license::where('license_product_name',$license_product_name)->where('license_key',$license_key)->get()->count();
if($checkCount<1){
 
    Activity_log::create([
        'license_product_name'=>$request->license_product_name,
        'license_key'=>$request->license_key,
'license_customer_name'=>'',
'license_customer_email'=>'',
'license_customer_country'=>$country,
'license_customer_ip'=>$ip,
'license_hardware_id'=>$request->license_hardware_id,
'license_action_status'=>"Invalid Product Name/License"

       ]); 
 
    return response()->json([
        'message' => "No Record Found"
    ], 406);
}
$dataTest = license::where('license_product_name',$license_product_name)->where('license_key',$license_key)->first();
$expiry = date('Y-m-d', strtotime($dataTest->license_expiry_date));
$today=date("Y-m-d");
if($expiry<=$today){
    Activity_log::create([
        'license_product_name'=>$request->license_product_name,
        'license_key'=>$request->license_key,
'license_customer_name'=>$dataTest->license_customer_name,
'license_customer_email'=>$dataTest->license_customer_email,
'license_customer_country'=>$country,
'license_customer_ip'=>$ip,
'license_hardware_id'=>$request->license_hardware_id,
'license_action_status'=>"License Expired"

       ]); 
    return response()->json([
        'message' => "License Has Been Expired"
    ], 406);
};



    $data_log = Activity_log::where('license_product_name',$request->license_product_name)->where('license_key',$request->license_key)->where('license_hardware_id',$request->license_hardware_id)->where('license_action_status','ACTIVATED')->get()->count();
    
    if($data_log>0)
    {

        Activity_log::create([
            'license_product_name'=>$request->license_product_name,
            'license_key'=>$request->license_key,
    'license_customer_name'=>$dataTest->license_customer_name,
    'license_customer_email'=>$dataTest->license_customer_email,
    'license_customer_country'=>$country,
    'license_customer_ip'=>$ip,
    'license_hardware_id'=>$request->license_hardware_id,
    'license_action_status'=>"OPENED"
    
           ]);

           return response()->json([
            'message' => "License Opened Successfully"
        ], 200);

    }
    else{
if($dataTest->license_used_activations >= $dataTest->license_allowed_activations)
{
    return response()->json([
        'message' => "License Allowed Activations Exceeded"
    ], 406);
}

        Activity_log::create([
            'license_product_name'=>$request->license_product_name,
            'license_key'=>$request->license_key,
    'license_customer_name'=>$dataTest->license_customer_name,
    'license_customer_email'=>$dataTest->license_customer_email,
    'license_customer_country'=>$country,
    'license_customer_ip'=>$ip,
    'license_hardware_id'=>$request->license_hardware_id,
    'license_action_status'=>"ACTIVATED"
    
           ]);

           license::where('license_product_name',$license_product_name)->where('license_key',$license_key)->update([
            'license_used_activations'=>$dataTest->license_used_activations + 1,
           ]);
return response()->json([
            'message' => "License Activated Successfully"
        ], 200);


    }
    
 
  
});
// [ApiController::class,'useLicense']);

Route::get('/test',function(Request $request){
    $ip = file_get_contents('https://api.ipify.org');
    return Location::get($ip)->countryName ;//exec('getmac');//$request->ip();
});