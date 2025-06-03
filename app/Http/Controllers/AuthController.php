<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class AuthController extends Controller
{
    public function loginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $creential = $request->validate(
            [
                'email' => 'required|email',
                'password' => 'required|min:3'
            ]
        );
        if (Auth::attempt($creential)) {
            $request->session()->regenerate();
            return redirect('/')->with('success', 'Login successful, Welcome ' . Auth::user()->name);
        }

        return back()->withErrors([
            'email' => 'Email Not Found',
        ])->onlyInput('email');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
