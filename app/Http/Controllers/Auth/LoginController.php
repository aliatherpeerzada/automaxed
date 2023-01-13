<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
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
 //     dd($data);
      if (Hash::check($validated['password'], $data[0]->password)) {
      
if(Auth::attempt($request->only('username', 'password')) )
        return redirect('/home');

    }
     
    }

}
