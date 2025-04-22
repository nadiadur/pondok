<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthenticatedSessionController extends Controller
{
    // Login user
    public function store(Request $request)
    {
        // Validate login credentials
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Redirect user based on their role
            $user = Auth::user();
            if ($user->role == 'admin') {
                return redirect()->route('admin.dashboard');
            }
            return redirect()->route('user.dashboard');
        }

        // If credentials are incorrect
        throw ValidationException::withMessages([
            'email' => ['The provided credentials are incorrect.'],
        ]);
    }

    // Logout user
    public function destroy(Request $request)
    {
        Auth::logout();

        // Redirect to home page after logout
        return redirect()->route('home');
    }
}
