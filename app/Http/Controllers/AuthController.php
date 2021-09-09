<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRegisterRequest;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function login(Request $request)
    {
        if(Auth::attempt($request->only('email', 'password'))) {
            return redirect(route('home'));
        }

        $error = 'Bad credentials. Please try again.';

        return view('auth.login', compact('error'));
    }

    public function register(UserRegisterRequest $request)
    {
        $user = User::create($request->only('name', 'email') + [
                'password' => Hash::make($request->input('password'))
            ]);

        event(new Registered($user));

        return redirect(route('loginForm'));
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect(route('loginForm'));
    }
}
