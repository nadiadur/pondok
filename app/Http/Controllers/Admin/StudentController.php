<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return view('admin.students.index', compact('students'));
    }

    public function create()
    {
        return view('admin.students.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required',
            'tanggal_masuk' => 'required|date',
            'alamat' => 'required'
        ]);

        Student::create($validated);

        return redirect()->route('admin.students.index')
            ->with('success', 'Data siswa berhasil ditambahkan');
    }

    public function edit(Student $student)
    {
        return view('admin.students.edit', compact('student'));
    }

    public function update(Request $request, Student $student)
    {
        $validated = $request->validate([
            'nama' => 'required',
            'tanggal_masuk' => 'required|date',
            'alamat' => 'required'
        ]);

        $student->update($validated);

        return redirect()->route('admin.students.index')
            ->with('success', 'Data siswa berhasil diupdate');
    }

    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('admin.students.index')
            ->with('success', 'Data siswa berhasil dihapus');
    }
}