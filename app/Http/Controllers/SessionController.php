<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{
    public function create()
    {
        return view('sessions.create');
    }

    public function store(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        if (auth()->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->to('/');
            return redirect()->intended('dashboard');
        }

            return back()->withErrors([
                'message' => 'The email or password is incorrect, please try again'
            ]);
    }
    public function destroy()
    {
        auth()->logout();
        return redirect()->to('/');
    }
}
