<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticationController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function signin(Request $request)
    {
        $request->validate(
            [
                'email' => 'required',
                'password' => 'required'
            ],
        );       
        $credential = $request->only('email', 'password');

        if (!Auth::attempt($credential)) {
            return back()->withErrors([
                'email' => 'Maaf email atau password anda salah',
            ])->onlyInput('email');
        }
        if (!Auth::check()) {
            // The user is not authenticated, so handle the error appropriately
            // For example, you could redirect them to the login page
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect()->back();
        } 
        
        $request->session()->regenerate();
        return redirect()->intended('/dashboard');
    }

    public function signup(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('auth');
    }

}
