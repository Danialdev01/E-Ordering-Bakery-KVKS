<?php

// app/Http/Controllers/CustomAuthController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class CustomAuthController extends Controller
{
    public function showLoginForm()
    {
        $users = User::all();
        return view('welcome', compact('users'));
    }

    public function login(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'secret_number' => 'required|string'
        ]);

        $user = User::find($request->user_id);

        if ($user && $user->secret_number === $request->secret_number) {
            Auth::login($user);
            return redirect()->intended('/dashboard');
        }

        return back()->withErrors([
            'secret_number' => 'Invalid secret number for selected user.'
        ])->withInput();
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}