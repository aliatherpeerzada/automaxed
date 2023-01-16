<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\LicenseController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
});

Route::Post('/logout',function(){
     Auth::logout();
        return redirect('/');
      
})->name('logout');

Route::post('/login',[LoginController::class,'customLogin'])->name('login');


Route::middleware(['auth'])->group(function () {
    Route::post('update-cred',[LicenseController::class,'update_cred'])->name('update-credentials');

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('add-license',[LicenseController::class,'add'])->name('add-license');
Route::get('settings',function(){
    $data=User::first();
return view('settings',['data'=>$data]);
});

Route::post('/license/{id}/update',[LicenseController::class,'licenseUpdate'])->name('update-license');
Route::get('/license/{id}/edit',function($id){
   $license= App\Models\license::where('id',$id)->first();
return view('edit-license',['license'=>$license]);
});
Route::post('/license-delete/{id}',[LicenseController::class,'delete']);
Route::get('/show-licenses',[LicenseController::class,'show'])->name('show-licenses');
Route::post('update-cred',[LicenseController::class,'update_cred'])->name('update-credentials');


});