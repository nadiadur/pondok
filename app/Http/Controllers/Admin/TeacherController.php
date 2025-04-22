<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TeacherController extends Controller
{
    public function index()
    {
        $teachers = Teacher::all();
        return view('admin.teachers.index', compact('teachers'));
    }

    public function create()
    {
        return view('admin.teachers.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required',
            'pengampu' => 'required',
            'alamat' => 'required',
            'no_telpon' => 'required',
            'gambar' => 'required|image',
            'keterangan' => 'required'
        ]);

        $gambar = $request->file('gambar')->store('teachers', 'public');
        $validated['gambar'] = $gambar;

        Teacher::create($validated);

        return redirect()->route('admin.teachers.index')
            ->with('success', 'Data guru berhasil ditambahkan');
    }

    public function edit(Teacher $teacher)
    {
        return view('admin.teachers.edit', compact('teacher'));
    }

    public function update(Request $request, Teacher $teacher)
    {
        $validated = $request->validate([
            'nama' => 'required',
            'pengampu' => 'required',
            'alamat' => 'required',
            'no_telpon' => 'required',
            'gambar' => 'image|nullable',
            'keterangan' => 'required'
        ]);

        if ($request->hasFile('gambar')) {
            Storage::disk('public')->delete($teacher->gambar);
            $validated['gambar'] = $request->file('gambar')->store('teachers', 'public');
        }

        $teacher->update($validated);

        return redirect()->route('admin.teachers.index')
            ->with('success', 'Data guru berhasil diupdate');
    }

    public function destroy(Teacher $teacher)
    {
        Storage::disk('public')->delete($teacher->gambar);
        $teacher->delete();

        return redirect()->route('admin.teachers.index')
            ->with('success', 'Data guru berhasil dihapus');
    }
}