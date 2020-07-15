<?php

namespace App\Http\Controllers\Courier\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return view('auth.courier.login');
    }

    
    public function login(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:8'
          ]);
          
          // Attempt to log the user in
          if (Auth::guard('courier')->attempt([
              'email' => $request->email, 
              'password' => $request->password], 
            $request->remember)) {
            // if successful, then redirect to their intended location
            return redirect()->intended(route('courier.dashboard'));
            //return true;
          } 
          // if unsuccessful, then redirect back to the login with the form data
          return redirect()->back()->withInput($request->only('email', 'remember'));
    }

    public function logout()
    {
        Auth::guard('courier')->logout();
        return redirect('/courier');
    }
}
