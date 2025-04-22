<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Registration;
class DashboardController extends Controller
{
    // Display User Dashboard
    public function index()
    {
        $userId = auth()->user()->id;
        $registration = Registration::where('user_id', $userId)->first() ?? null;
    
        return view('user.dashboard', compact('registration'));
    }
}