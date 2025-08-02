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
    public function destroy($id)
{
    $registration = Registration::findOrFail($id);

    // Hapus file dokumen jika disimpan di public
    if ($registration->foto_kk && file_exists(public_path($registration->foto_kk))) {
        unlink(public_path($registration->foto_kk));
    }

    if ($registration->akte && file_exists(public_path($registration->akte))) {
        unlink(public_path($registration->akte));
    }

    $registration->delete();

    return back()->with('success', 'Data pendaftaran berhasil dihapus!');
}

}