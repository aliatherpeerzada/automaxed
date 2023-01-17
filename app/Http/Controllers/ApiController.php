<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function useLicense(Request $request, $email,$licenseKey){
dd($request);
    }
}
