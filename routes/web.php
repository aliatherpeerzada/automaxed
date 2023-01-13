<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\LicenseController;
use App\Models\User;
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
    return view('welcome');
});

Route::Post('/logout',function(){
     Auth::logout();
        return redirect('/');
      
})->name('logout');

Route::post('/login',[LoginController::class,'customLogin'])->name('login');





Route::post('update-cred',[LicenseController::class,'update_cred'])->name('update-credentials');
Route::middleware(['auth'])->group(function () {


    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('add-license',[LicenseController::class,'add'])->name('add-license');
Route::get('settings',function(){
    $data=User::first();
return view('settings',['data'=>$data]);
});



});