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
    
    
    $ip=$request->ip()=="::1"?'127.0.0.1':$request->ip();
        $pip = file_get_contents('https://api.ipify.org');

    $hid=exec('getmac');
    $hid = strtok($hid, ' '); 
    $country=Location::get($pip)->countryName;
    $email=$request->email;
    $key=$request->key;

    $data = license::where('customer_email',$email)->where('license_key',$key)->where('allowed_activities','>',0)->first();
    if(isset($data)){
       Activity_log::create([
        'license_key'=>$key,
        'name'=>$data->customer_name,
        'email'=>$email,
        'ip'=>$ip,
        'hardware_id'=>$hid,
        'country'=>$country
       ,'status'=>'Activated'
       ]); 
       license::where('customer_email',$email)->where('license_key',$key)->update([
        'allowed_activities'=>$data->allowed_activities -1,
       ]);

return "License Activated Successfully";
    }
    else{
        // Activity_log::create([
        //     'license_key'=>$key,
        //     'name'=>'',
        //     'email'=>$email,
        //     'ip'=>$ip,
        //     'hardware_id'=>$hid,
        //     'country'=>$country
        //    ,'status'=>'FAILED'
        //    ]);

         return "Customer Email / License Not Found";
    }
return  ;
});
// [ApiController::class,'useLicense']);

Route::get('/test',function(Request $request){
    $ip = file_get_contents('https://api.ipify.org');
    return Location::get($ip)->countryName ;//exec('getmac');//$request->ip();
});