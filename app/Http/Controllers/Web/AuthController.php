<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Services\AuthService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function __construct(
        private readonly AuthService $authService
    ) {}

    public function showLogin()
    {
        return view('auth.login');
    }

    public function showRegister()
    {
        return view('auth.register');
    }

    public function showDashboard()
    {
        return view('dashboard', ['user' => Auth::user()]);
    }

    public function showProfile()
    {
        return view('profile', ['user' => Auth::user()]);
    }

    public function login(LoginRequest $request)
    {
        $token = $this->authService->login($request->validated());

        if (!$token) {
            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ]);
        }

        return redirect()->intended('dashboard');
    }

    public function register(RegisterRequest $request)
    {
        $this->authService->register($request->validated());
        
        return redirect()->route('login')->with('success', 'Registration successful! Please login.');
    }

    public function logout(Request $request)
    {
        $this->authService->logout($request->user());
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function updateProfile(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . Auth::id()],
        ]);

        $user = Auth::user();
        $user->update($validated);

        return back()->with('success', 'Profile updated successfully!');
    }
} 