<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthLoginRegister;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function store(AuthLoginRegister $request)
    {
        $credentials = $request->only(['email', 'password']);

        if (!Auth::attempt($credentials)) {
            return redirect()->route('login')->with('error', 'E-mail e/ou senha inválidos');
        }

        $request->session()->regenerate();
        return redirect()->route('dashboard');
    }

    public function destroy()
    {
        request()->session()->invalidate();
        Auth::logout();
        return redirect()->route('home');
    }
}
