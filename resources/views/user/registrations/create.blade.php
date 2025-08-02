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
                <a class="nav-link " href="{{ route('user.account') }}">
                    <i class="fas fa-user-cog"></i> Ganti Password
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link active" href="{{ route('user.registrations.create') }}">
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

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">Form Pendaftaran Santri</h4>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('user.registration.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Nama Lengkap</label>
                            <input type="text" name="nama" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Alamat</label>
                            <textarea name="alamat" class="form-control" rows="3" required></textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Tahun Masuk</label>
                            <input type="number" name="tahun_masuk" class="form-control" min="2024" max="2030" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Nama Ibu</label>
                            <input type="text" name="nama_ibu" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Nama Ayah</label>
                            <input type="text" name="nama_ayah" class="form-control" required>
                        </div>
                       <div class="form-group mb-3">
                            <label for="telpon">Nomor Telepon</label>
                            <input type="text" name="telpon" class="form-control" id="telpon" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Foto Kartu Keluarga</label>
                            <input type="file" name="foto_kk" class="form-control" accept="image/*" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Foto Akte Kelahiran</label>
                            <input type="file" name="akte" class="form-control" accept="image/*" required>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Kirim Pendaftaran</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection