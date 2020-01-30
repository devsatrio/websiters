<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Admin;
use Illuminate\Support\Facades\Auth;

class AdminControl extends Controller
{  
  
    public function __construct(){
      $this->middleware('guest:admin')->except('logout');   
    }

    function index(){
        return view('authadmin.login');
    }
    function login(Request $request){
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:5'
          ]);
        // Attempt to log the user in
      if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
        // if successful, then redirect to their intended location
        return redirect()->intended(route('admin.dashboard'));
      }
      // if unsuccessful, then redirect back to the login with the form data
      return redirect()->back()->withInput($request->only('email', 'remember'));
    }
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}
