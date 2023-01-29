<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function customLogin(Request $request){
        $validated = $request->validate([
              'secret' => 'required|max:255',
              'username' => 'required',
              'password'=>'required'
          ]);
  
        $data= User::where('username','=',$validated['username'])->get();
        
        if(count($data)==0){
          return redirect()->back()->with('message','No Record Exist With This Username');
        }
        $data= User::where('username',$validated['username'])->where('secret',$validated['secret'])->get();
        
        if(count($data)==0){
          return redirect()->back()->with('message','Incorrect Secret Phrase');
        }
      //  dd($data[0]->password);
        if (Hash::check($validated['password'], $data[0]->password)) {
  if(Auth::attempt(['username'=>$data[0]['username'],'password'=> $validated['password'] ]) ){
  return  redirect('/home');
        }   else{
          return redirect()->back()->with('message','Validation Failed');
   
        }
}else{
  return redirect()->back()->with('message','Incorrect Password');
  
}
     

    }
  
}
