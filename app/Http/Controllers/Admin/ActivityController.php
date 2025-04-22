<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ActivityController extends Controller
{
    public function index()
    {
        $activities = Activity::all();
        return view('admin.activities.index', compact('activities'));
    }

    public function create()
    {
        return view('admin.activities.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kategori' => 'required',
            'nama_kegiatan' => 'required',
            'tanggal' => 'required|date',
            'gambar' => 'required|image',
            'lokasi' => 'required',
            'keterangan' => 'required'
        ]);

        $gambar = $request->file('gambar')->store('activities', 'public');
        $validated['gambar'] = $gambar;

        Activity::create($validated);

        return redirect()->route('admin.activities.index')
            ->with('success', 'Kegiatan berhasil ditambahkan');
    }

    public function edit(Activity $activity)
    {
        return view('admin.activities.edit', compact('activity'));
    }

    public function update(Request $request, Activity $activity)
    {
        $validated = $request->validate([
            'kategori' => 'required',
            'nama_kegiatan' => 'required',
            'tanggal' => 'required|date',
            'gambar' => 'image|nullable',
            'lokasi' => 'required',
            'keterangan' => 'required'
        ]);

        if ($request->hasFile('gambar')) {
            Storage::disk('public')->delete($activity->gambar);
            $validated['gambar'] = $request->file('gambar')->store('activities', 'public');
        }

        $activity->update($validated);

        return redirect()->route('admin.activities.index')
            ->with('success', 'Kegiatan berhasil diupdate');
    }

    public function destroy(Activity $activity)
    {
        Storage::disk('public')->delete($activity->gambar);
        $activity->delete();

        return redirect()->route('admin.activities.index')
            ->with('success', 'Kegiatan berhasil dihapus');
    }
}