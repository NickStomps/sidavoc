<?php

namespace App\Http\Controllers;

use App\Models\role;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        // show login form
        return view('login');
    }

    public function login(Request $request)
    {
        // validate the form data
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $credentials = $request->only('email', 'password');

        // attempt to log the user in
        if (Auth::attempt($credentials)) {
            // Login success
            return redirect()->intended('/account');
        }

        // login failed
        return back()->withErrors(['email' => 'Invalid credentials']);
    }

    public function showRegistrationForm()
    {
        $roles = role::all(); 
        return view('register', ['roles' => $roles]);
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'roleId' => 'required|integer',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'roleId' => $request->roleId,
            'password' => bcrypt($request->password),
        ]);

        Auth::login($user);

        return redirect('/account');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
