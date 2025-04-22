
@extends('layouts.app')

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
    
<div class="container">
    <h2>Daftar Pendaftaran Santri</h2>
    
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>Nama</th>
                    <th>Tahun Masuk</th>
                    <th>Status</th>
                    <th>Dokumen</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($registrations as $registration)
                <tr>
                    <td>{{ $registration->created_at->format('d/m/Y') }}</td>
                    <td>{{ $registration->nama }}</td>
                    <td>{{ $registration->tahun_masuk }}</td>
                    <td>
                        <span class="badge bg-{{ $registration->status === 'pending' ? 'warning' : ($registration->status === 'approved' ? 'success' : 'danger') }}">
                            {{ ucfirst($registration->status) }}
                        </span>
                    </td>
                    <td>
                        <a href="{{ $registration->foto_kk }}" target="_blank" class="btn btn-sm btn-info">KK</a>
                        <a href="{{ $registration->akte }}" target="_blank" class="btn btn-sm btn-info">Akte</a>
                    </td>
                    <td>
                        <form action="{{ route('admin.registrations.update-status', $registration) }}" method="POST" class="d-inline">
                            @csrf
                            @method('PATCH')
                            <select name="status" class="form-select form-select-sm d-inline-block w-auto" onchange="this.form.submit()">
                                <option value="pending" {{ $registration->status === 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="approved" {{ $registration->status === 'approved' ? 'selected' : '' }}>Approve</option>
                                <option value="rejected" {{ $registration->status === 'rejected' ? 'selected' : '' }}>Reject</option>
                            </select>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection