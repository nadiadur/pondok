<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Management;
use Illuminate\Http\Request;

class ManagementController extends Controller
{
    public function index()
    {
        $managements = Management::all();
        return view('admin.management.index', compact('managements'));
    }

    public function create()
    {
        return view('admin.management.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'jabatan' => 'required',
            'nama' => 'required',
            'masa_aktif_mulai' => 'required|date',
            'masa_aktif_selesai' => 'required|date|after:masa_aktif_mulai'
        ]);

        Management::create($validated);

        return redirect()->route('admin.management.index')
            ->with('success', 'Data manajemen berhasil ditambahkan');
    }

    public function edit(Management $management)
    {
        return view('admin.management.edit', compact('management'));
    }

    public function update(Request $request, Management $management)
    {
        $validated = $request->validate([
            'jabatan' => 'required',
            'nama' => 'required',
            'masa_aktif_mulai' => 'required|date',
            'masa_aktif_selesai' => 'required|date|after:masa_aktif_mulai'
        ]);

        $management->update($validated);

        return redirect()->route('admin.management.index')
            ->with('success', 'Data manajemen berhasil diupdate');
    }

    public function destroy(Management $management)
    {
        $management->delete();
        return redirect()->route('admin.management.index')
            ->with('success', 'Data manajemen berhasil dihapus');
    }
}