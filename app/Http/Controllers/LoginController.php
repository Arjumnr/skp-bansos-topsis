<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(Request $request){
        if (auth()->check()) {
            return redirect()->route('admin');
        }
        return view('login');

            // return redirect()->route('login');
        
    }

    public function login(Request $request){
        try{
           
            if(auth()->attempt(array('username' => $request['username'], 'password' => $request['password'])))
            {
                $request->session()->regenerate();
                return response()->json(['code' => 200, 'success' => true, 'message' => 'Login Success']);
                
            }else{
                return response()->json(['code' => 400, 'success' => false, 'message' => 'Login Failed']);
            }
        }catch (\Exception $e){
            return redirect('/auth/login')->with('error', $e->getMessage());
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
 
        $request->session()->invalidate();

        return redirect('/auth/login');
    }
}
