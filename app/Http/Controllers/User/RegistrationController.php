<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RegistrationController extends Controller
{
    public function create()
    {
        return view('user.registrations.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'tahun_masuk' => 'required|date_format:Y',
            'nama_ibu' => 'required',
            'nama_ayah' => 'required',
              'telpon' => 'required|string',
            'foto_kk' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'akte' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        // Handle file uploads
        $fotoKK = $request->file('foto_kk')->store('public/kk');
        $akte = $request->file('akte')->store('public/akte');

        // Create registration
        $registration = new Registration($validated);
        $registration->user_id = auth()->id();
        $registration->foto_kk = Storage::url($fotoKK);
        $registration->akte = Storage::url($akte);
        $registration->status = 'pending'; // Tambahkan status default
        $registration->save();

        return redirect()->route('user.dashboard')
            ->with('success', 'Pendaftaran berhasil dikirim dan sedang menunggu persetujuan!');
    }
}