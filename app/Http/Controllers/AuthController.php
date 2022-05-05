<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index()
    {
        return view('admin.login');
    }
    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if(auth()->attempt($request->only('email','password'))){
            return redirect()->route('dashboard');
        } else {
            return back()->with('status', 'Invalid login credentials');
        }
    }
    public function logout()
    {
        auth()->logout();
        return redirect()->route('login');
    }
}
