<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LicenseController;
use App\Models\Activity_log;
use App\Models\license;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Spatie\SimpleExcel\SimpleExcelWriter;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
if (Auth::check()) {
return redirect('/home');
}

return view('welcome');
})->name('welcome');


Route::Post('/logout',function(){
Auth::logout();
return redirect('/');
})->name('logout');

Route::get('/generateuuid',function(){
    return Illuminate\Support\Str::uuid()->getHex();
});


Route::post('/login',[HomeController::class,'customLogin'])->name('login');



Route::middleware(['auth'])->group(function () {
    

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('update-cred',[LicenseController::class,'update_cred'])->name('update-credentials');
Route::post('company_name_change',[LicenseController::class,'change_name'])->name('company_name_change');

Route::get('settings',function(){
    $data=User::first();
    return view('settings',['data'=>$data]);
    });








Route::post('add-license',[LicenseController::class,'add'])->name('add-license');


Route::post('/license/{id}/update',[LicenseController::class,'licenseUpdate'])->name('update-license');
Route::get('/license/{id}/edit',function($id){
$license= App\Models\license::where('id',$id)->first();
return view('edit-license',['license'=>$license]);
});
Route::get('/license/{id}/view',function($id){
    $license= App\Models\license::where('id',$id)->first();
    return view('view-license',['license'=>$license]);
    });
    Route::get('/upload-csv',function(){
        return view('import_csv');
    })->name('csv-upload');

Route::post('/license-delete/{id}',[LicenseController::class,'delete']);

Route::get('/show-licenses',[LicenseController::class,'show'])->name('show-licenses');

Route::post('import-csv',[LicenseController::class,'import'])->name('import-csv');
Route::post('update-cred',[LicenseController::class,'update_cred'])->name('update-credentials');


Route::get('/show-activity',[ActivityController::class,'show'])->name('show-activity'); 

});




Route::get('gen-excel',function(){


    $writer = SimpleExcelWriter::streamDownload('all-licenses.xlsx')
    ->addHeader(['license_product_name', 'license_expiry_date','license_status','license_used_activations',
    'license_allowed_activations','license_key','license_customer_name','license_customer_email','license_note'
]);
    $datas=license::latest()->get();
  //  dd($datas);
    $count=0;
foreach($datas as $data){
    $writer->addRow([
        'license_product_name'=>$data->license_product_name,
         'license_expiry_date'=>$data->license_expiry_date,
         'license_status'=>$data->license_status,
         'license_used_activations'=>$data->license_used_activations,
        'license_allowed_activations'=>$data->license_allowed_activations,
        'license_key'=>$data->license_key,
        'license_customer_name'=>$data->license_customer_name,
        'license_customer_email'=>$data->license_customer_email,
        'license_note'=>$data->license_note
    ]);
    $count=$count+1;

    if($count==1000){
        flush(); 
    }
}

// $writer->toBrowser();
    
})->name('export.spatie') ;


Route::get('gen-csv',function(){


    $writer = SimpleExcelWriter::streamDownload('all-licenses.csv')
    ->addHeader(['license_product_name', 'license_expiry_date','license_status','license_used_activations',
    'license_allowed_activations','license_key','license_customer_name','license_customer_email','license_note'
]);
    $datas=license::latest()->get();
  //  dd($datas);
    $count=0;
foreach($datas as $data){
    $writer->addRow([
        'license_product_name'=>$data->license_product_name,
         'license_expiry_date'=>$data->license_expiry_date,
         'license_status'=>$data->license_status,
         'license_used_activations'=>$data->license_used_activations,
        'license_allowed_activations'=>$data->license_allowed_activations,
        'license_key'=>$data->license_key,
        'license_customer_name'=>$data->license_customer_name,
        'license_customer_email'=>$data->license_customer_email,
        'license_note'=>$data->license_note
    ]);
    $count=$count+1;

    if($count==1000){
        flush(); 
    }
}

// $writer->toBrowser();
    
})->name('export.csv') ;



Route::get('gen-activity-csv',function(){


    $writer = SimpleExcelWriter::streamDownload('Activity.csv')
    ->addHeader([
        'license_product_name',
        'license_key',
'license_customer_name',
'license_customer_email',
'license_customer_country',
'license_customer_ip',
'license_hardware_id',
'license_action_status'
]);
    $datas=Activity_log::latest()->get();
  //  dd($datas);
    $count=0;
foreach($datas as $data){
    $writer->addRow([
        'license_product_name'=>$data->license_product_name,
        'license_key'=>$data->license_key,
'license_customer_name'=>$data->license_customer_name,
'license_customer_email'=>$data->license_customer_email,
'license_customer_country'=>$data->license_customer_country,
'license_customer_ip'=>$data->license_customer_ip,
'license_hardware_id'=>$data->license_hardware_id,
'license_action_status'=>$data->license_action_status
    ]);
    $count=$count+1;

    if($count==1000){
        flush(); 
    }
}

// $writer->toBrowser();
    
})->name('activity.csv') ;


Route::get('gen-activity-excel',function(){


   
    $writer = SimpleExcelWriter::streamDownload('Activity.xlsx')
    ->addHeader([
        'license_product_name',
        'license_key',
'license_customer_name',
'license_customer_email',
'license_customer_country',
'license_customer_ip',
'license_hardware_id',
'license_action_status'
]);
    $datas=Activity_log::latest()->get();
  //  dd($datas);
    $count=0;
foreach($datas as $data){
    $writer->addRow([
        'license_product_name'=>$data->license_product_name,
        'license_key'=>$data->license_key,
'license_customer_name'=>$data->license_customer_name,
'license_customer_email'=>$data->license_customer_email,
'license_customer_country'=>$data->license_customer_country,
'license_customer_ip'=>$data->license_customer_ip,
'license_hardware_id'=>$data->license_hardware_id,
'license_action_status'=>$data->license_action_status
    ]);
    $count=$count+1;

    if($count==1000){
        flush(); 
    }
}
    
})->name('activity.excel') ;