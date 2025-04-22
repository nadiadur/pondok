@extends('layouts.app')
@section('content')
<style>
  body {
      min-height: 100vh;
      margin: 0;
      background: linear-gradient(135deg, #f6f9fc 0%, #edf2f7 100%);
      font-family: 'Inter', sans-serif;
  }
  
  .sidebar {
      width: 280px;
      background: #fff;
      box-shadow: 0 0 20px rgba(0,0,0,0.05);
      padding: 25px;
      height: 100vh;
      transition: all 0.3s ease;
      position: fixed;
      border-right: 1px solid rgba(0,0,0,0.05);
  }
  
  .sidebar h5 {
      font-weight: 600;
      color: #2d3748;
      margin-bottom: 25px;
      padding-bottom: 15px;
      border-bottom: 2px solid #edf2f7;
  }
  
  .nav-link {
      color: #4a5568;
      padding: 12px 16px;
      border-radius: 12px;
      transition: all 0.3s ease;
      margin: 8px 0;
      display: flex;
      align-items: center;
      font-weight: 500;
  }
  
  .nav-link i {
      margin-right: 12px;
      font-size: 1.1rem;
  }
  
  .nav-link:hover {
      background-color: #f7fafc;
      color: #4299e1;
      transform: translateX(5px);
  }
  
  .nav-link.active {
      background: linear-gradient(135deg, #4299e1, #2b6cb0);
      color: #fff;
      box-shadow: 0 4px 12px rgba(66, 153, 225, 0.2);
  }
  
  .main-content {
      margin-left: 300px;
      padding: 40px;
      width: calc(100% - 300px);
      transition: all 0.3s ease;
  }

  .card-custom {
      background: #fff;
      border-radius: 16px;
      padding: 25px;
      box-shadow: 0 4px 6px rgba(0,0,0,0.02), 0 1px 3px rgba(0,0,0,0.03);
      transition: all 0.3s ease;
      border: 1px solid rgba(0,0,0,0.05);
      margin-bottom: 24px;
  }

  .card-custom:hover {
      transform: translateY(-4px);
      box-shadow: 0 8px 20px rgba(0,0,0,0.06);
  }

  .card-custom h5 {
      color: #2d3748;
      font-weight: 600;
      margin-bottom: 20px;
      padding-bottom: 15px;
      border-bottom: 2px solid #edf2f7;
  }

  .form-control {
      border: 2px solid #edf2f7;
      border-radius: 10px;
      padding: 12px 16px;
      transition: all 0.3s ease;
  }

  .form-control:focus {
      border-color: #4299e1;
      box-shadow: 0 0 0 3px rgba(66, 153, 225, 0.15);
  }

  .btn-primary {
      background: linear-gradient(135deg, #4299e1, #2b6cb0);
      border: none;
      padding: 12px 24px;
      border-radius: 10px;
      font-weight: 500;
      transition: all 0.3s ease;
  }

  .btn-primary:hover {
      transform: translateY(-2px);
      box-shadow: 0 4px 12px rgba(66, 153, 225, 0.3);
  }

  .btn-danger {
      background: linear-gradient(135deg, #f56565, #c53030);
      border: none;
      padding: 12px 24px;
      border-radius: 10px;
      font-weight: 500;
      transition: all 0.3s ease;
  }

  .btn-danger:hover {
      transform: translateY(-2px);
      box-shadow: 0 4px 12px rgba(245, 101, 101, 0.3);
  }

  .btn-logout {
      background: linear-gradient(135deg, #f56565, #c53030);
      border: none;
      padding: 14px;
      color: white;
      border-radius: 12px;
      transition: all 0.3s ease;
      font-weight: 500;
      width: 100%;
      display: flex;
      align-items: center;
      justify-content: center;
  }

  .btn-logout:hover {
      background: linear-gradient(135deg, #e53e3e, #9b2c2c);
      box-shadow: 0 4px 12px rgba(229, 62, 62, 0.3);
      transform: translateY(-2px);
  }

  .alert {
      border-radius: 12px;
      padding: 16px;
      margin-bottom: 20px;
  }

  .alert-success {
      background-color: #c6f6d5;
      border: 1px solid #9ae6b4;
      color: #2f855a;
  }

  .alert-danger {
      background-color: #fed7d7;
      border: 1px solid #feb2b2;
      color: #c53030;
  }

  label {
      font-weight: 500;
      color: #4a5568;
      margin-bottom: 8px;
      display: block;
  }

  .password-section {
      margin-bottom: 30px;
  }

  .delete-account-section {
      background: #fff5f5;
      border: 1px solid #feb2b2;
      padding: 20px;
      border-radius: 12px;
  }
</style>

<div class="d-flex">
  <!-- Sidebar -->
  <div class="sidebar">
      <h5><i class="fas fa-school me-2"></i>Dashboard</h5>
      <ul class="nav flex-column">
          <li class="nav-item">
              <a class="nav-link" href="{{ route('user.dashboard') }}">
                  <i class="fas fa-home"></i> Dashboard
              </a>
          </li>
          <li class="nav-item">
              <a class="nav-link active" href="{{ route('user.account') }}">
                  <i class="fas fa-user-cog"></i> Ganti Password
              </a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="{{ route('user.registrations.create') }}">
                  <i class="fas fa-user-edit"></i> Pendaftaran
              </a>
          </li>
          <li class="nav-item mt-4">
              <form action="{{ route('logout') }}" method="POST">
                  @csrf
                  <button type="submit" class="btn-logout">
                      <i class="fas fa-sign-out-alt me-2"></i> Logout
                  </button>
              </form>
          </li>
      </ul>
  </div>

  <!-- Main Content -->
  <div class="main-content">
    <h2 class="mb-4 text-gray-800 font-weight-bold">Pengaturan Akun</h2>

    <!-- Card Ganti Password -->
    <div class="card-custom">
        <h5>Ganti Password</h5>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form id="password-form" action="{{ route('user.update-password') }}" method="POST" class="password-section">
            @csrf
            <div class="mb-4">
                <label>Password Lama</label>
                <input type="password" name="current_password" class="form-control @error('current_password') is-invalid @enderror" required>
                @error('current_password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-4">
                <label>Password Baru</label>
                <input type="password" name="new_password" class="form-control @error('new_password') is-invalid @enderror" required>
                @error('new_password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-4">
                <label>Konfirmasi Password Baru</label>
                <input type="password" name="new_password_confirmation" class="form-control" required>
            </div>
            <button type="button" class="btn btn-primary" onclick="confirmPasswordChange()">
                <i class="fas fa-key me-2"></i> Ganti Password
            </button>
        </form>
    </div>

    <!-- Card Hapus Akun -->
    <div class="card-custom">
        <h5>Hapus Akun</h5>
        <div class="delete-account-section">
            <p class="text-danger mb-4">Perhatian: Menghapus akun akan menghapus semua data Anda secara permanen. Tindakan ini tidak dapat dibatalkan.</p>
            <button class="btn btn-danger" onclick="confirmDelete()">
                <i class="fas fa-trash-alt me-2"></i> Hapus Akun
            </button>
        </div>
    </div>
</div>
</div>

<!-- Include SweetAlert2 CSS and JS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.7.12/sweetalert2.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.7.12/sweetalert2.all.min.js"></script>

<script>
  // Handle password change confirmation
  function confirmPasswordChange() {
      Swal.fire({
          title: 'Konfirmasi Perubahan Password',
          text: "Apakah Anda yakin ingin mengubah password?",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Ya, Ubah Password',
          cancelButtonText: 'Batal'
      }).then((result) => {
          if (result.isConfirmed) {
              document.getElementById('password-form').submit();
          }
      });
  }

  // Handle account deletion confirmation
  function confirmDelete() {
      Swal.fire({
          title: 'Peringatan!',
          text: "Anda akan menghapus akun secara permanen. Tindakan ini tidak dapat dibatalkan!",
          icon: 'error',
          showCancelButton: true,
          confirmButtonColor: '#d33',
          cancelButtonColor: '#3085d6',
          confirmButtonText: 'Ya, Hapus Akun',
          cancelButtonText: 'Batal',
          customClass: {
              confirmButton: 'btn btn-danger',
              cancelButton: 'btn btn-secondary'
          }
      }).then((result) => {
          if (result.isConfirmed) {
              document.getElementById('delete-account-form').submit();
          }
      });
  }

  // Show success message if password changed successfully
  @if(session('success'))
      Swal.fire({
          title: 'Berhasil!',
          text: "{{ session('success') }}",
          icon: 'success',
          confirmButtonColor: '#3085d6',
          confirmButtonText: 'OK'
      });
  @endif

  // Show error message if there are any errors
  @if($errors->any())
      Swal.fire({
          title: 'Error!',
          html: `@foreach($errors->all() as $error)
                  <p>{{ $error }}</p>
                 @endforeach`,
          icon: 'error',
          confirmButtonColor: '#d33',
          confirmButtonText: 'OK'
      });
  @endif
</script>

<form id="delete-account-form" action="{{ route('user.delete-account') }}" method="POST" style="display: none;">
  @csrf
  @method('DELETE')
</form>

@endsection