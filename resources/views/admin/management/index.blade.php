@extends('layouts.app')

@section('title', 'Data Kepengurusan')

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
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Data Kepengurusan</h5>
        <a href="{{ route('admin.management.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah Pengurus
        </a>
    </div>
    <div class="card-body">
        @if(session('success'))
        <div class="alert alert-success">
            {{ str_replace('Data manajemen', 'Data pengurus', session('success')) }}
        </div>
    @endif

        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Jabatan</th>
                        <th>Nama</th>
                        <th>Masa Aktif Mulai</th>
                        <th>Masa Aktif Selesai</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($managements as $management)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $management->jabatan }}</td>
                        <td>{{ $management->nama }}</td>
                        <td>{{ $management->masa_aktif_mulai }}</td>
                        <td>{{ $management->masa_aktif_selesai }}</td>
                        <td>
                            <a href="{{ route('admin.management.edit', $management) }}" 
                               class="btn btn-sm btn-warning">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('admin.management.destroy', $management) }}" method="POST" class="d-inline delete-form">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger delete-button">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const forms = document.querySelectorAll('.delete-form');

        forms.forEach(form => {
            form.addEventListener('submit', function (e) {
                e.preventDefault();
                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: 'Data pengurus akan dihapus secara permanen!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    });
</script>
@endsection
