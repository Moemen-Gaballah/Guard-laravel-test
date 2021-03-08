<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Admin;

class LoginController extends Controller
{
   public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('welcome');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

   public function register(Request $request)
    {
       $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|confirmed',
        ]);

       $request_data = $request->except(['password', 'password_confirmation']);
        $request_data['password'] = bcrypt($request->password);
       // dd($request->all());
       $user =  Admin::create($request_data);

       session()->flash('success', 'done added successfully');

       return redirect()->route('admin.login');
    }
}
