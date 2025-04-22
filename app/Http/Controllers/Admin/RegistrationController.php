<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Registration;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function index()
    {
        $registrations = Registration::with('user')->latest()->get();
        return view('admin.registrations.index', compact('registrations'));
    }

    public function updateStatus(Registration $registration, Request $request)
    {
        $validated = $request->validate([
            'status' => 'required|in:approved,rejected'
        ]);

        $registration->update($validated);

        return back()->with('success', 'Status pendaftaran berhasil diupdate!');
    }
}