@extends('layouts.app')

@section('title', 'Edit Data Guru')

@section('content')
<style>
    body {
        min-height: 100vh;
        display: block;
        margin: 0;
        background-color: #f5f5f5;
        width: 100%;
        height: 100%;
    }
      /* Sidebar */
      .sidebar {
        width: 250px;
        background-color: #fff;
        border-right: 1px solid #ddd;
        padding: 20px;
      }
      .sidebar h5 {
        margin-bottom: 30px;
        font-weight: 600;
      }
      .nav-link {
        color: #333;
        margin: 8px 0;
      }
      .nav-link:hover {
        background-color: #e9ecef;
        border-radius: 4px;
      }
      .nav-link i {
        margin-right: 8px;
      }
      /* Sub-menu style */
      .collapse-inner .nav-link {
        margin-left: 20px;
        margin-top: 5px;
      }
      /* Aktif menu style */
      .nav-link.active {
        background-color: #0d6efd;
        color: #fff;
      }
      /* Konten utama */
      .main-content {
        flex: 1;
        padding: 20px;
      }
      .main-content h2 {
        margin-bottom: 30px;
      }
      /* Card shortcut */
      .shortcut-card {
        background-color: #fff;
        border: 1px solid #ddd;
        border-radius: 8px;
        padding: 20px;
        text-align: center;
        transition: 0.2s;
        cursor: pointer;
      }
      .shortcut-card:hover {
        background-color: #f8f9fa;
      }
      .shortcut-card .icon {
        font-size: 2rem;
        margin-bottom: 10px;
      }
      .shortcut-card .title {
        font-weight: 600;
        font-size: 1.1rem;
      }
      /* Footer */
      .footer-text {
        margin-top: 30px;
        font-size: 0.9rem;
        color: #888;
        text-align: center;
      }
    </style>
    <div class="d-flex min-vh-100">
      <!-- SIDEBAR -->
       <!-- SIDEBAR -->
       <div class="sidebar">
        <h5>Menu</h5>
        <ul class="nav flex-column">
          <!-- Dashboard -->
          <li class="nav-item">
            <a class="nav-link active" href="#">
              <i class="fas fa-tachometer-alt"></i> Dashboard
            </a>
          </li>
          <!-- Data (dengan sub-menu) -->
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#submenuData" role="button" aria-expanded="false" aria-controls="submenuData">
              <i class="fas fa-database"></i> Data
            </a>
            <div class="collapse" id="submenuData">
              <div class="collapse-inner nav flex-column">
                <a class="nav-link" href="{{ route('admin.teachers.index') }}">
                  <i class="fas fa-user-tie"></i> Guru
                </a>
                <a class="nav-link" href="{{ route('admin.activities.index') }}">
                  <i class="fas fa-calendar-alt"></i> Kegiatan
                </a>
                <a class="nav-link" href="{{ route('admin.students.index') }}">
                  <i class="fas fa-user-graduate"></i> Santri
                </a>
              </div>
            </div>
          </li>
          <!-- Kepengurusan -->
          <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.management.index') }}">
              <i class="fas fa-users-cog"></i> Kepengurusan
            </a>
          </li>
          <!-- Pendaftaran -->
          <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.registrations.index') }}">
              <i class="fas fa-file-signature"></i> Pendaftaran
            </a>
          </li>
        </ul>
    
        <!-- Tombol Logout -->
        <form action="{{ route('logout') }}" method="POST" class="mt-4">
          @csrf
          <button type="submit" class="btn btn-danger w-100">
            <i class="fas fa-sign-out-alt"></i> Logout
          </button>
        </form>
      </div>
      <div class="container-fluid px-4 py-0">
<div class="card">
    <div class="card-header">
        <h5 class="mb-0">Edit Data Guru</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.teachers.update', $teacher) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" name="nama" class="form-control" value="{{ old('nama', $teacher->nama) }}" required>
            </div>

            <div class="mb-3">
                <label for="pengampu" class="form-label">Pengampu</label>
                <input type="text" name="pengampu" class="form-control" value="{{ old('pengampu', $teacher->pengampu) }}" required>
            </div>

            <div class="mb-3">
                <label for="no_telpon" class="form-label">No. Telpon</label>
                <input type="text" name="no_telpon" class="form-control" value="{{ old('no_telpon', $teacher->no_telpon) }}" required>
            </div>

            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <textarea name="alamat" class="form-control" required>{{ old('alamat', $teacher->alamat) }}</textarea>
            </div>

            <div class="mb-3">
                <label for="keterangan" class="form-label">Keterangan</label>
                <textarea name="keterangan" class="form-control" required>{{ old('keterangan', $teacher->keterangan) }}</textarea>
            </div>

            <div class="mb-3">
                <label for="gambar" class="form-label">Foto</label>
                <input type="file" name="gambar" class="form-control">
                @if($teacher->gambar)
                <img src="{{ Storage::url($teacher->gambar) }}" alt="Foto Guru" width="100" class="mt-2 rounded">
                @endif
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-success">Update</button>
                <a href="{{ route('admin.teachers.index') }}" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection
