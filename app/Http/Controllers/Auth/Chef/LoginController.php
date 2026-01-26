<?php

namespace App\Http\Controllers\Auth\chef;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;



class LoginController extends Controller
{
   public function create(){
     return view('auth.chef_login');
   }
  public function store(Request $request)
    {
        $request->validate([
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255'],
            'password' => ['required', 'string'],
        ]);

        if(! Auth::guard('chef')->attempt($request->only('email', 'password'), $request->boolean('remember')))
        {
            throw ValidationException::withMessages([
                'email' => trans('auth.failed'),
            ]);
        }

        $request->session()->regenerate();
             return redirect()->intended(RouteServiceProvider::CHEF_DASHBOARD);

   
    }
     public function destroy(Request $request)
    {
        Auth::guard('chef')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/chef/login');
    }


}
